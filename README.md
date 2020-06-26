# trials
To whom it may concern,

The given tasks are analysed. Moreover, I asked the following questions to understand the task better:

* when I am adding the property data to the database, should I add unlisted columns as well such as UUID? Otherwise, UUID may not be matched for API based database updates.
* it says database shall be updated if API's property detail changes. So, should updating be done regularly (like regular pings calls) or when demanded?
* It is understood that the tasks for the manually updated data are not affected by API updated data when viewed, so should those manually updated properties be excluded from the future API based updates?
* In 1st question, we can’t reach the property directly without UUID. No specific API calls for that in API as well. String match might fail only with these fields if the API's property is changed but not the database's.
* Can admin add a completely new property with new UUID? If a complete new prop is desired to be added, then a new UUID should be created.
* Should admin has to manually add the property after the API query by clicking the add button? In that case, adding properties beforehand may not be needed(referring to question 1).
* "full details URL" in the first question’s field list does not exist in API calls.
* in 1st q's field list: Property type is an array object in the API. On the other hand, in 2nd q, the dropdown selection may not be implemented in the database. Can I just use the property type title?

I have done most of the tasks. However, I couldn't complete all, because my questions haven't been answered yet.

Finally,
Completed tasks allow you:
* to fill all the data from API (2532 records)
* to update selected the property
* to delete any property. You can see deleted properties when you see all properties.
* to see all the updated properties and browse with page buttons (first, last, previous, next pages).

You can visit http://185.122.57.199/yen to view everything. You can try to delete and update any property.
If you want to reload all the data from the API, you have to visit http://185.122.57.199/yenFill
Thank you.
Kind regards.
