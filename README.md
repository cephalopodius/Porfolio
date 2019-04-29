
-create the database with the sql file.(database default name : "porfolio oc")
-install composer.
!Warning : must have more than 5.5.12 php version.!
-install twig with composer. (composer require "twig/twig:^2.0")
-open composer.json file in root project.
-add after the ], from "Authors" the following text:
  "autoload": {

		"psr-4":{

         "App\\Controller\\": "Controller",

		"App\\Model\\Router\\": "Model/Router",

         "App\\Repository\\": "Repository",
     
	 "App\\Model\\": "Model"

		}

	},

-use command window and write : composer install
-project in ready to run.