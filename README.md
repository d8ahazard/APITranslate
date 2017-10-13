# APITranslate

##Usage:

1.  Extract on a webserver with PHP.  
2.  Export your agent's json files in the API.ai console under settings > import/export > export.
3.  From the exported .zip file, extract the /entities and /intents folders into the root of this project.
4.  Create a new Cloud Translate project on Google.  I'm not giving out creds for this because it's a paid service,
but for a one-off translation, they should offer free trial that should be more than adequate for the text in an agent file.

    This should be named credentials.json and be placed in the root of the project directory.
5.  Browse to localhost/PROJECT/parseIntents.php?lang=XX OR localhost/PROJECT/parseEntities.php?lang=XX, replacing XX for the language you want to translate it into.
6.  Wait.  You'll see the output in your browser showing you every string and it's replacement, as well as the output JSON.
7.  Output will be written to the respective /entities and /intents folders, with the selected language appended to the end.
8.  When you've created the translation files for whatever languages you want, simply drop the /intents and /entities folder *back* into the .zip you exported.
9.  Re-import the .zip into API.ai.
10. ??
11. PROFIT!!


# Notes:

This has been tested on PHP7 on synology, as well as an UNMODIFIED Xampp7 installation on Windows.

If you're not using Xampp or synology, you may need to do *other* things to get this working.

If you get an error while translating, have to stop, etc - be sure to delete the outputted entity/intent file before re-running.
To save $$ on Google, it will not translate a file if the corresponding language file exists already.


# Gratuity?!

Did I just save you a whole buttload of time with this sweet, sweet bit of code? Do you want to be my new best friend?

Unfortunately, long-distance relationships normally don't work, so instead, you can say thanks by sending me some $$ on paypal.

donate.to.digitalhigh@gmail.com

