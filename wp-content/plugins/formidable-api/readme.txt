== Changelog ==
= 1.0b7 =
* Show the webhooks menu
* Updates for 2.0 compatability (will be moving into the Form actions later)

= 1.0b6 =
* Fix PUT/PATCH methods instead of assuming POST
* Let the JSON API plugin handle the data fetching and decoding
* Fill in entry values with those from the existing entry when editing

= 1.0b5 =
* Allow field keys to work for sending data for creating entries
* Format data for specific fields as needed before an entry is created

= 1.0b4 =
* Updated authentication for v1.0 of the JSON Rest API plugin
* Fixed editing entries
* Bug fixes

= 1.0b3 =
* Added functionality to edit entries
* Save authorization errors to global so they can later be returned
* Added 'test' parameter to the create entry function for testing without creating an entry
* Added json_encode JSON_PRETTY_PRINT fallback for PHP < 5.4

= 1.0b2 =
* Fixed permission checking