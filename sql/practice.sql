INSERT INTO user (userId, userActivationToken, userEmail, userName, userHash, userSalt) VALUES
	(57e001dacda7444493ddf8df143d431d,11cccb9bf715af1c5a00330a88470fa0,zspangler@gmail.com,zspang,
	 063b6645cdb3042291015982db2e30d5df9746a772fb0b42c8ba108bcc8326ba5fd587a8fb8ad6b08d434d9bb3a1fe92270d06ce836de0dadbc56469ffa31360, 8b20cee20d192945db6fc76b9674d7d0fab776b9416e74e4715f296f2e77b1fc)

SELECT (userId, userEmail, userName) FROM user WHERE userName = zspang

UPDATE user SET userName = zspangler WHERE userId = 57e001dacda7444493ddf8df143d431d

SELECT (userId, userEmail, userName) FROM user WHERE userName = zspangler

DELETE FROM user WHERE userName = zspangler


