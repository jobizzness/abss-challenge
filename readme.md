# PHP Challenge API spec


## Overview
This repository contains an API definition. Your task is to build the three API endpoints based on the "API scenario" outlined below.

The result must be coded in PHP. You can choose what framework and tools you want to use. At ABSS, we have applications built in Phalcon and Laravel. We also use Angular 1 and Vue.JS for our frontend.

## Deliverables
A public BitBucket, Github or Gitlab repository containing all the source code required to run the solution.

You may choose to include:

*	Unit tests for your solution
*	Installation instructions (composer etc.)
*	Testing instructions
*	Deployment instructions (e.g. a docker image)
*	Docmentation 
*	Any other features or examples that you would like to show us.

You may also choose to setup any CI/CD services and/or deploy your solution to a service like heroku (or your server of choice). Please note this is **not** a core requirement and is an option for you to show us your skills.

Please only spend 2-3 hours on this solution, and focus on the skills you want to show us. You may choose to do unit/integration/contract testing or you may decide that automation is more important.

## The API Scenario
An Open API spec is available at https://bitbucket.org/abss-engineering/php-challenge/. You You need to implement all three API endpoints defined by the spec. The app you�re building is a simple invoice calculator for different taxes.

### Ping

This endpoint response is used to see if everything is working. It should check:
*	The application is correctly configured.
*	Any data storage (database, files etc) is working correctly.

### Items
This endpoint should return a list of items. We�ve provided sample data in this repository (`data/`). Make sure that:
*	Numbers are displayed to the correct decimal places
*	The schema matches the API definition

### Invoice
When you POST to this endpoint, the response should include a completed invoice including calculations. Make sure that
*	Numbers are displayed to the correct decimal places
*	The schema matches the API definition

You do not have to save or persist the invoice in a database.

### A note on calculations:
As a final step, make sure that your invoice calculations follow the following rules:

*	A discount can be no less than 0%, and no greater than 50%
*	Calculate taxes according to the following statement:
*	Calculate each line tax exclusive
	* 	Determine the tax due for each line rounded to 4 decimal places
	*	The line total should be rounded to 2 decimal places
	*	The total tax due should be the total of all taxes, rounded to 2 decimal places
*	The invoice total should be the sum of the lines (exclusive) + the tax total
*	The invoice response should use the inventory names and prices and ignore all nullable fields POST�ed to the API.


### The API Spec
The full API documentation is available at [https://abss-engineering-php-challenge.netlify.com](https://abss-engineering-php-challenge.netlify.com)

JSON Schemas are located in the `schemas/` directory and define the API request and response body. You may find these useful for validation purposes. We publish these schemas to the documentation URL.

In case you're curious, we run `npm run publish` to generate and publish the API documentation and schemas to netlify.

For more information about how this API specification was written, see [API.md](API.md)

## Questions?
If you have any questions about completing this challenge, please email the hiring manager (you'll have this information in your email).



