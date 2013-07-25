This module does the following:

* Provides a frontend page named "Business Hours", which displays messages about opening and closure of your shop, according to the current date and time, and two tables showing your business hours and your Holiday dates.
* Provides a backend management to enter opening hours and Holiday.
* Adds in Franck Gelinas's timepicker javascript functionality
* Adds a javascript digital clock.


When you'll come to include it with your theme, you'll probably discover that text infos at right, on the calendar, is not perfectly centered. You 'll want to adjust the businesshours.css. 
At the end of this file you'll find :
#text_box{
position:relative;
top:-153px;
left:0px;
}
Please change top and left values to center the text on the image (and resist to the temptation of doing more than this! ;-)

Usage :
shop/Business hours

1) You simply enter the hours when you're open, no need to enter the weekly days off : the module is going to compute them.
2) You can enable or disable a period. 
3) You can enter only two opening periods by day, including disabled periods.
4) You can specify an ending time after midnight : if your pub is open from 18:00 to 2:30 you can specify these hours.

