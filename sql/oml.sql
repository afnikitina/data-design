-- hexadecimal explanation

INSERT INTO profile(profileId
				,profileAtHandle
				,profileEmail
				,profileHash
				,profilePhone)
VALUES 		(unhex("3d9f0ee88b9d11e89eb6529269fb1459")
				,"gkephart"
				,"gkephart@cnm.edu"
				,"0487b516b1afb6d18b9ba560808df1086515a72c5c1391b16d46970446fe799d1007623dfc4da118920bea7a395a179ac"
				,"505-555-5555"
				);

UPDATE profile SET profileActivationToken="f7482a27c67e3b590847f5468c23bebf" WHERE profileId = unhex("3d9f0ee88b9d11e89eb6529269fb1459");

DELETE FROM profile WHERE profileId=unhex("3d9f0ee88b9d11e89eb6529269fb1459");

SELECT profileAtHandle
		,profileEmail
		,profileHash
		,profilePhone
FROM profile WHERE profilePhone = "505-555-5555";
