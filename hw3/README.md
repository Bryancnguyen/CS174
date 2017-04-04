[] All the web pages you output validate as XHTML 5.

[] Your project is written using namespaces. You only create variables, arrays, objects, define new classes, etc. in the namespace cool_name_for_your_group\hw3 and subnamespaces thereof.

[x] Typing php CreateDb.php while in a shell in the configs folder creates an initial Mysql Database with tables created in BCNF. The tables' schemas is reasonable for storing and retrieving any data similar to that given in the mock-up views above.

[] Your project defines base classes: Controller, Model, View, Element, and Helper. The namespaces for these and their subclasses should be respectively: cool_name_for_your_group\hw3\controllers, cool_name_for_your_group\hw3\models, cool_name_for_your_group\hw3\views, cool_name_for_your_group\hw3\views\elements, and cool_name_for_your_group\hw3\views\helpers.

[] Your project uses the Model View Adapter pattern that we have discussed in class. This item is for overall how well you succeeded at this. What this means for particular classes will be described in the next several points.

[] Only controller classes directly handle request/form data. Controllers use this information to invoke model methods that make database calls to get/set/update info in the database, then choose a view, instantiate it, and call its render() method to display a web page back to the requesting browser.

[x] Only subclasses of Model interact with the database. The base Model class has methods for performing the initial connection to the database. Model classes have methods to marshal a particular kind of object from one or more tables, and to take already created objects and unmarshal them persistently into the database.

[] Only subclasses of View, Element, Helper, Layout are allowed to render HTML. Each view is used to render a particular kind of whole web page. Elements are used to render a particular portion of a web page that might occur on several kinds of web pages (for example, a navigation block). Helpers have methods which make it easy to output the HTML for particular kinds of widgets (say a method that takes an array and uses it to outut the HTML for a dropdown with the elements coming from the array). Layouts are used to output common header and footer HTML that might be used by several views.

[] On the Landing page and sublist page, List links take one to the page of the appropriate sublist (for a link on a sublist page to the appropriate sub sub list, for a link on a sub sub list to the appropriate sub sub sub list, etc.).

[] Note links take one to the appropriate Display Note page.

[] Next to note links is the date on which that note was created.

[] The main landing page corresponds to viewing the root list. Other than the root list each list has a parent list, which is the list that the New List link was clicked on to create it.

[] On a sublist page, etc., if the nesting of lists is too great then the main heading is of the form: Note-A-List/../Parent List/Current List.

[] Links on each pages main heading take one to the appropriate list. I.e., in Note-A-List/../Parent List/Current List, the Note-A-List link takes on to the landing page, the Parent List link takes one to the parent sublist page, and the Current List link points to the current page.

[] Notes are listed from newest to oldest, categories are listed in alphabetical order. Sorting is done at the database query level, not after the data is retrieved.

[] The New List page allows a sub list to be added to the current list. If the name is blank, or sanitizes using filter_var to blank no new list is added. In both cases, after the action is performed the current list page is shown.

[] The New Note page allows a new note to be added to the current list. If either field is blank, or sanitizes using filter_var to blank no new note is added. In both cases, after the action is performed the current list page is shown.

[] The Display Note page shows a previously created note as illustrated in the mock-ups above.
