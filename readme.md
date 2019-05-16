# Project 4
+ By: Gary Host
+ Production URL: <http://p4.garyhost.me>

## Feature summary
* This website is a photo organizer and EXIF-data extractor designed to look similar to traditional 35mm contact 
sheets. I tailored it to support my photography, as I am often uncomfortable with the slow and bloated software that 
exists. 

+ Users can register and log-in. I adapted Laravel's system slightly to meet course requirements.
+ Users can upload multiple image files at a time; thumbnails are created for precise pixel count.
+ The most useful EXIF data is extracted from the files and loaded into the database.
+ Contact sheets use the same ratios, including spacing, as traditional 35mm contact sheets.
+ Users can delete sheets/photos and edit detail data for photos.
+ Users are blocked from viewing other users' contact sheets and images.

## Database summary

In addition to the migrations and password tables, my application has 3 tables in total (`users`, `sheets`, and 
`images`).
+ There's a one-to-many relationship between `users` and `sheets`.
+ There's a one-to-many relationship between `sheets` and `images`.

## Outside resources
I used the library [Intervention Image](http://image.intervention.io/) for image resizing, reading, and EXIF 
extraction. I adapted the built-in Laravel login and password system. I used [this 
page](https://www.media.mit.edu/pia/Research/deepview/exif.html) at the MIT media lab to understand the EXIF format. 
I used [this tutorial](https://laraveldaily.com/upload-multiple-files-laravel-5-4/) from Laravel Daily as a starting 
point to upload multiple files. I consulted StackOverflow for an elegant way to do [Delete 
Confirmation](https://stackoverflow.com/questions/32984859/delete-confirmation-in-laravel) in Laravel.

## Code style divergences
*N/A that I know of*

## Notes for instructor
*I consulted [tutsplus](https://code.tutsplus.com/tutorials/how-to-register-use-laravel-service-providers--cms-28966) 
again to explore setting up services to remove some logic code from my controller file, but I was getting an 
inexplicable error about the service not being found. Honestly, I found this aspect of Laravel a bit unwieldly. As I 
was finishing the project, I saw you had posted some guidance on this, but I saw that you said it wasn't required. In 
any case, I extracted some of the logic code into the controller class so that the single key upload method was not 
out of control. There are a lot of additional features that I could have added for such an ambitious project, but I 
tried to do enough to distinguish from foobooks and the standard catalog idea.

