<?php
				function generatePassword( $len )
				{
				// Set allowed chars
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	
				// Create username
					$nnn = "";
					for ( $i = 0; $i < $len; $i++ )
						{
						$nnn .= $chars[mt_rand(0, strlen($chars)-1)];
						}
					return $nnn;
				}
				function generateUserName( $leng )
				{
				// Set allowed chars
					$chars = "0123456789";
	
				// Create username
					$nnn = "";
					for ( $i = 0; $i < $leng; $i++ )
						{
						$nnn .= $chars[mt_rand(0, strlen($chars)-1)];
						}
					return $nnn;
				}
				?>