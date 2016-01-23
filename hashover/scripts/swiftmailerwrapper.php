<?php

// Copyright (C) 2016 Stéphane Mourey
// This file is part of HashOver created by Jacob Barkdull.
//
// HashOver is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// HashOver is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with HashOver.  If not, see <http://www.gnu.org/licenses/>.

// A wrapper to make SwiftMailer as usable as the built-in PHP mail function

final class swiftMailerWrapper {
	private static $_instance;

	private $transporter = null;
	private $mailer = null;

	private function __clone() {}

	public function __wakeup() {
		throw new Exception("Cannot unserialize singleton");
	}

	private function __construct(array $settings){
		if (!array_key_exists('SwiftMailerTransport',$settings))
			throw new Exception('No SwiftMailerTransport set!');
		if ($settings['SwiftMailerTransport']!='SMTP' && $settings['SwiftMailerTransport']!='Sendmail'){
			error_log(print_r($settings,true));
			throw new Exception('Trying to set SwiftMailerTransport to unsupported value:"'.$settings['SwiftMailerTransport'].'"!');
		}

		$keys2init = array('SwiftMailerSendmailCommand' => null,
		                   'SwiftMailerSmtpPort'        => 25,
		                   'SwiftMailerSmtpUsername'    => false,
		                   'SwiftMailerSmtpPassword'    => false,
		                   'SwiftMailerSmtpEncryption'  => null,
		                  );
		foreach ($keys2init as $k => $v) {
			if (!array_key_exists($k,$settings))
				$settings[$k]=$v;
		}

		if ($settings['SwiftMailerTransport']==='SMTP'){
			if (!array_key_exists('SwiftMailerSmtpHost',$settings))
				throw new Exception('You MUST set a SMTP host to use SMTP to send mail with SwiftMailer.');
			$properties2set = array('SwiftMailerSmtpHost' => 'setHost',
			                        'SwiftMailerSmtpPort' => 'setPort',
			                        'SwiftMailerSmtpUsername' => 'setUsername',
			                        'SwiftMailerSmtpPassword' => 'setPassword',
			                        'SwiftMailerSmtpEncryption' => 'setEncryption',
			                       );
			$this->transporter = Swift_SmtpTransport::newInstance();
			foreach ($properties2set as $k => $v) {
				if ($settings[$k])
					$this->transporter->$v($settings[$k]);
			}
		}else{
			$this->transporter = Swift_SendmailTransport::newInstance($settings['SwiftMailerSendmailCommand']);
		}
	}

	public static function setInstance(array $settings){
		if (!is_null(self::$_instance))
			throw new Exception('swiftMailerWrapper already set, you cannot set it again !');
		self::$_instance = new swiftMailerWrapper($settings);
	}

	public static function getInstance(){
		if (is_null(self::$_instance))
			throw new Exception('swiftMailerWrapper is not set already, you must set it with the setInstance method before using it !');
		return self::$_instance;
	}

	public function initMailer(){
		$this->mailer = Swift_Mailer::newInstance($this->transporter);
	}

	public function mail($to,$subject,$message){
		if (!$this->mailer)
			$this->initMailer();
		$msg = Swift_Message::newInstance($subject)
			->setFrom('brokenclock@free.fr')
			->setTo($to)
			->setBody($message);
		$this->mailer->send($msg);
	}

}
