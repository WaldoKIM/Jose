/*
       JavaScript functions for the Fourmilab Calendar Converter

                  by John Walker  --  September, MIM
              http://www.fourmilab.ch/documents/calendar/

                This program is in the public domain.
*/

/*  You may notice that a variety of array variables logically local
    to functions are declared globally here.  In JavaScript, construction
    of an array variable from source code occurs as the code is
    interpreted.  Making these variables pseudo-globals permits us
    to avoid overhead constructing and disposing of them in each
    call on the function in which whey are used.  */

var J0000 = 1721424.5;                // Julian date of Gregorian epoch: 0000-01-01
var J1970 = 2440587.5;                // Julian date at Unix epoch: 1970-01-01
var JMJD  = 2400000.5;                // Epoch of Modified Julian Date system
var J1900 = 2415020.5;                // Epoch (day 1) of Excel 1900 date system (PC)
var J1904 = 2416480.5;                // Epoch (day 0) of Excel 1904 date system (Mac)

var NormLeap = new Array("평년", "윤년");

/*  WEEKDAY_BEFORE  --  Return Julian date of given weekday (0 = Sunday)
                        in the seven days ending on jd.  */
function mod(a, b)
{
    return a - (b * Math.floor(a / b));
}
function amod(a, b)
{
    return mod(a - 1, b) + 1;
}

var Weekdays = new Array( "일요일", "월요일", "화요일", "수요일",
                          "목요일", "금요일", "토요일" );

function jwday(j)
{
    return mod(Math.floor((j + 1.5)), 7);
}

function weekday_before(weekday, jd)
{
    return jd - jwday(jd - weekday);
}

/*  SEARCH_WEEKDAY  --  Determine the Julian date for: 

            weekday      Day of week desired, 0 = Sunday
            jd           Julian date to begin search
            direction    1 = next weekday, -1 = last weekday
            offset       Offset from jd to begin search
*/

function search_weekday(weekday, jd, direction, offset)
{
    return weekday_before(weekday, jd + (direction * offset));
}

//  Utility weekday functions, just wrappers for search_weekday

function nearest_weekday(weekday, jd)
{
    return search_weekday(weekday, jd, 1, 3);
}

function next_weekday(weekday, jd)
{
    return search_weekday(weekday, jd, 1, 7);
}

function next_or_current_weekday(weekday, jd)
{
    return search_weekday(weekday, jd, 1, 6);
}

function previous_weekday(weekday, jd)
{
    return search_weekday(weekday, jd, -1, 1);
}

function previous_or_current_weekday(weekday, jd)
{
    return search_weekday(weekday, jd, 1, 0);
}

function TestSomething()
{
}

//  LEAP_GREGORIAN  --  Is a given year in the Gregorian calendar a leap year ?

function leap_gregorian(year)
{
    return ((year % 4) == 0) &&
            (!(((year % 100) == 0) && ((year % 400) != 0)));
}

//  GREGORIAN_TO_JD  --  Determine Julian day number from Gregorian calendar date

var GREGORIAN_EPOCH = 1721425.5;

function gregorian_to_jd(year, month, day)
{
    return (GREGORIAN_EPOCH - 1) +
           (365 * (year - 1)) +
           Math.floor((year - 1) / 4) +
           (-Math.floor((year - 1) / 100)) +
           Math.floor((year - 1) / 400) +
           Math.floor((((367 * month) - 362) / 12) +
           ((month <= 2) ? 0 :
                               (leap_gregorian(year) ? -1 : -2)
           ) +
           day);
}

//  JD_TO_GREGORIAN  --  Calculate Gregorian calendar date from Julian day

function jd_to_gregorian(jd) {
    var wjd, depoch, quadricent, dqc, cent, dcent, quad, dquad,
        yindex, dyindex, year, yearday, leapadj;

    wjd = Math.floor(jd - 0.5) + 0.5;
    depoch = wjd - GREGORIAN_EPOCH;
    quadricent = Math.floor(depoch / 146097);
    dqc = mod(depoch, 146097);
    cent = Math.floor(dqc / 36524);
    dcent = mod(dqc, 36524);
    quad = Math.floor(dcent / 1461);
    dquad = mod(dcent, 1461);
    yindex = Math.floor(dquad / 365);
    year = (quadricent * 400) + (cent * 100) + (quad * 4) + yindex;
    if (!((cent == 4) || (yindex == 4))) {
        year++;
    }
    yearday = wjd - gregorian_to_jd(year, 1, 1);
    leapadj = ((wjd < gregorian_to_jd(year, 3, 1)) ? 0
                                                  :
                  (leap_gregorian(year) ? 1 : 2)
              );
    month = Math.floor((((yearday + leapadj) * 12) + 373) / 367);
    day = (wjd - gregorian_to_jd(year, month, 1)) + 1;

    return new Array(year, month, day);
}

//  ISO_TO_JULIAN  --  Return Julian day of given ISO year, week, and day

function n_weeks(weekday, jd, nthweek)
{
    var j = 7 * nthweek;

    if (nthweek > 0) {
        j += previous_weekday(weekday, jd);
    } else {
        j += next_weekday(weekday, jd);
    }
    return j;
}

function iso_to_julian(year, week, day)
{
    return day + n_weeks(0, gregorian_to_jd(year - 1, 12, 28), week);
}

//  JD_TO_ISO  --  Return array of ISO (year, week, day) for Julian day

function jd_to_iso(jd)
{
    var year, week, day;

    year = jd_to_gregorian(jd - 3)[0];
    if (jd >= iso_to_julian(year + 1, 1, 1)) {
        year++;
    }
    week = Math.floor((jd - iso_to_julian(year, 1, 1)) / 7) + 1;
    day = jwday(jd);
    if (day == 0) {
        day = 7;
    }
    return new Array(year, week, day);
}

//  ISO_DAY_TO_JULIAN  --  Return Julian day of given ISO year, and day of year

function iso_day_to_julian(year, day)
{
    return (day - 1) + gregorian_to_jd(year, 1, 1);
}

//  JD_TO_ISO_DAY  --  Return array of ISO (year, day_of_year) for Julian day

function jd_to_iso_day(jd)
{
    var year, day;

    year = jd_to_gregorian(jd)[0];
    day = Math.floor(jd - gregorian_to_jd(year, 1, 1)) + 1;
    return new Array(year, day);
}

/*  PAD  --  Pad a string to a given length with a given fill character.  */

function pad(str, howlong, padwith) {
    var s = str.toString();

    while (s.length < howlong) {
        s = padwith + s;
    }
    return s;
}

//  JULIAN_TO_JD  --  Determine Julian day number from Julian calendar date

var JULIAN_EPOCH = 1721423.5;

function leap_julian(year)
{
    return mod(year, 4) == ((year > 0) ? 0 : 3);
}

function julian_to_jd(year, month, day)
{

    /* Adjust negative common era years to the zero-based notation we use.  */

    if (year < 1) {
        year++;
    }

    /* Algorithm as given in Meeus, Astronomical Algorithms, Chapter 7, page 61 */

    if (month <= 2) {
        year--;
        month += 12;
    }

    return ((Math.floor((365.25 * (year + 4716))) +
            Math.floor((30.6001 * (month + 1))) +
            day) - 1524.5);
}

//  JD_TO_JULIAN  --  Calculate Julian calendar date from Julian day

function jd_to_julian(td) {
    var z, a, alpha, b, c, d, e, year, month, day;

    td += 0.5;
    z = Math.floor(td);

    a = z;
    b = a + 1524;
    c = Math.floor((b - 122.1) / 365.25);
    d = Math.floor(365.25 * c);
    e = Math.floor((b - d) / 30.6001);

    month = Math.floor((e < 14) ? (e - 1) : (e - 13));
    year = Math.floor((month > 2) ? (c - 4716) : (c - 4715));
    day = b - d - Math.floor(30.6001 * e);

    /*  If year is less than 1, subtract one to convert from
        a zero based date system to the common era system in
        which the year -1 (1 B.C.E) is followed by year 1 (1 C.E.).  */

    if (year < 1) {
        year--;
    }

    return new Array(year, month, day);
}


//  MAYAN_COUNT_TO_JD  --  Determine Julian day from Mayan long count

var MAYAN_COUNT_EPOCH = 584282.5;

function mayan_count_to_jd(baktun, katun, tun, uinal, kin)
{
    return MAYAN_COUNT_EPOCH +
           (baktun * 144000) +
           (katun  *   7200) +
           (tun    *    360) +
           (uinal  *     20) +
           kin;
}

//  JD_TO_MAYAN_COUNT  --  Calculate Mayan long count from Julian day
   


function jd_to_mayan_count(jd)
{
    var d, baktun, katun, tun, uinal, kin;

    jd = Math.floor(jd) + 0.5;
    d = jd - MAYAN_COUNT_EPOCH;
    baktun = Math.floor(d / 144000);
    d = mod(d, 144000);
    katun = Math.floor(d / 7200);
    d = mod(d, 7200);
    tun = Math.floor(d / 360);
    d = mod(d, 360);
    uinal = Math.floor(d / 20);
    kin = mod(d, 20);

    return new Array(baktun, katun, tun, uinal, kin);
}

//  JD_TO_MAYAN_HAAB  --  Determine Mayan Haab "month" and day from Julian day

var MAYAN_HAAB_MONTHS = new Array("Pop", "Uo", "Zip", "Zotz", "Tzec", "Xul",
                                  "Yaxkin", "Mol", "Chen", "Yax", "Zac", "Ceh",
                                  "Mac", "Kankin", "Muan", "Pax", "Kayab", "Cumku", "Uayeb");

function jd_to_mayan_haab(jd)
{
    var lcount, day;

    jd = Math.floor(jd) + 0.5;
    lcount = jd - MAYAN_COUNT_EPOCH;
    day = mod(lcount + 8 + ((18 - 1) * 20), 365);

    return new Array (Math.floor(day / 20) + 1, mod(day, 20));
}

//  JD_TO_MAYAN_TZOLKIN  --  Determine Mayan Tzolkin "month" and day from Julian day

var MAYAN_TZOLKIN_MONTHS = new Array("Imix", "Ik", "Akbal", "Kan", "Chicchan",
                                     "Cimi", "Manik", "Lamat", "Muluc", "Oc",
                                     "Chuen", "Eb", "Ben", "Ix", "Men",
                                     "Cib", "Caban", "Etznab", "Cauac", "Ahau");

function jd_to_mayan_tzolkin(jd)
{
    var lcount;

    jd = Math.floor(jd) + 0.5;
    lcount = jd - MAYAN_COUNT_EPOCH;
    return new Array (amod(lcount + 20, 20), amod(lcount + 4, 13));
}



/*  updateFromGregorian  --  Update all calendars from Gregorian.
                             "Why not Julian date?" you ask.  Because
                             starting from Gregorian guarantees we're
                             already snapped to an integral second, so
                             we don't get roundoff errors in other
                             calendars.  */

function updateFromGregorian()
{
    var j, year, mon, mday, hour, min, sec, ACDC,
        weekday, julcal, hebcal, islcal, hmindex, utime, isoweek,
        may_countcal, mayhaabcal, maytzolkincal, frrcal,
        indcal, isoday, xgregcal;

    year = new Number(document.gregorian.year.value);
    mon = document.gregorian.month.selectedIndex;
    mday = new Number(document.gregorian.day.value);
    hour = min = sec = 0;
    hour = new Number(document.gregorian.hour.value);
    min = new Number(document.gregorian.min.value);
    sec = new Number(document.gregorian.sec.value);
    ACDC = document.gregorian.adbc.value;
//alert(ACDC);
    //ACDC
    if (ACDC == "bc"){
    year = "-"+year};

    
    
    //공란 입력 방지
    if (year == 0 || mday == 0){
    alert("0년은 존재하지 않습니다");};

    if (year == "" || mday == ""){
    alert("년월일을 정확히 입력해주세요");};
    
    
    
    
    //  Update Julian day

    j = gregorian_to_jd(year, mon + 1, mday) +
           (Math.floor(sec + 60 * (min + 60 * hour) + 0.5) / 86400.0);
    
    
    
    //부활절달걀
    
    if (j == 2456282.5)
    {var e = confirm("\"잊지마세요, 언제나 찰리가 가장 먼저 전해드립니다!\"\n(찰리의 방송을 들으시려면 확인을 누르세요)");
            if(e == true){
                var ifr = document.createElement('iframe');
    var src = document.getElementById('x');
    var hidee = document.querySelector('.edel');            
ifr.src = 'https://www.youtube.com/embed/TCkLhEJa4sQ?start=184&end=201&rel=0&controls=0&showinfo=0';
ifr.style.width='1200px';
ifr.style.height='600px';
hidee.style.display='inline-block';               
src.appendChild(ifr);
}
};
    
    
    if (j == 2266286.5)
    {var e = confirm("\"육지다! 육지가 보인다!!!\"");
            if(e == true){
                var ifr = document.createElement('iframe');
    var src = document.getElementById('x');
    var hidee = document.querySelector('.edel');            
ifr.src = 'https://www.youtube.com/embed/WYeDsa4Tw0c?start=15&end=35&rel=0&controls=0&showinfo=0';
ifr.style.width='1200px';
ifr.style.height='600px';
hidee.style.display='inline-block';               
src.appendChild(ifr);
}
};    

    
if (j == 2446803.5)
    {var e = confirm("\"It's my birthday!!!\"");
            if(e == true){
                var ifr = document.createElement('iframe');
    var src = document.getElementById('x');
    var hidee = document.querySelector('.edel');            
ifr.src = 'https://www.youtube.com/embed/8zgz2xBrvVQ?start=109&end=120&rel=0&controls=0&showinfo=0';
ifr.style.width='1200px';
ifr.style.height='600px';
hidee.style.display='inline-block';               
src.appendChild(ifr);
}
};        
    
     https://www.youtube.com/watch?v=8zgz2xBrvVQ
     
                
                // window.open("https://www.youtube.com/embed/TCkLhEJa4sQ?start=184&end=200");  
            
                
        
            
        
    
    //0년 오류 수정
    if (j <1721425.5) {
        j = j+366;};
    //기원전 1년 2월 29일 문제 수정
    if (j == 1721119.5 && mon ==1 ) {
        j = j-1;}
    else if (j <1721119.5) {
        j = j-1;};
        
    document.julianday.day.value = j;
    document.modifiedjulianday.day.value = j - JMJD;
    //  Update day of week in Gregorian box

    weekday = jwday(j);
    document.gregorian.wday.value = Weekdays[weekday];

    //  Update leap year status in Gregorian box

    document.gregorian.leap.value = NormLeap[leap_gregorian(year) ? 1 : 0];

    //  Update Julian Calendar

    julcal = jd_to_julian(j);
    document.juliancalendar.year.value = julcal[0];
    document.juliancalendar.month.selectedIndex = julcal[1] - 1;
    document.juliancalendar.day.value = julcal[2];
    document.juliancalendar.leap.value = NormLeap[leap_julian(julcal[0]) ? 1 : 0];
    weekday = jwday(j);
    document.juliancalendar.wday.value = Weekdays[weekday];

    
    //  Update Mayan Calendars

    may_countcal = jd_to_mayan_count(j);
    document.mayancount.baktun.value = may_countcal[0];
    document.mayancount.katun.value = may_countcal[1];
    document.mayancount.tun.value = may_countcal[2];
    document.mayancount.uinal.value = may_countcal[3];
    document.mayancount.kin.value = may_countcal[4];
    mayhaabcal = jd_to_mayan_haab(j);
    document.mayancount.haab.value = "" + mayhaabcal[1] + " " + MAYAN_HAAB_MONTHS[mayhaabcal[0] - 1];
    maytzolkincal = jd_to_mayan_tzolkin(j);
    document.mayancount.tzolkin.value = "" + maytzolkincal[1] + " " + MAYAN_TZOLKIN_MONTHS[maytzolkincal[0] - 1];

    
   
//  calcGregorian  --  Perform calculation starting with a Gregorian date

function calcGregorian()
{
    updateFromGregorian();
}

//  calcJulian  --  Perform calculation starting with a Julian date

function calcJulian()
{
    var j, date, time;

    j = new Number(document.julianday.day.value);
    date = jd_to_gregorian(j);
    time = jhms(j);
    document.gregorian.year.value = date[0];
    document.gregorian.month.selectedIndex = date[1] - 1;
    document.gregorian.day.value = date[2];
    document.gregorian.hour.value = pad(time[0], 2, " ");
    document.gregorian.min.value = pad(time[1], 2, "0");
    document.gregorian.sec.value = pad(time[2], 2, "0");
    updateFromGregorian();
}

//  setJulian  --  Set Julian date and update all calendars

function setJulian(j)
{
    document.julianday.day.value = new Number(j);
    calcJulian();
}

//  calcModifiedJulian  --  Update from Modified Julian day

function calcModifiedJulian()
{
    setJulian((new Number(document.modifiedjulianday.day.value)) + JMJD);
}

//  calcJulianCalendar  --  Update from Julian calendar

function calcJulianCalendar()
{
    setJulian(julian_to_jd((new Number(document.juliancalendar.year.value)),
                           document.juliancalendar.month.selectedIndex + 1,
                           (new Number(document.juliancalendar.day.value))));
}

function calcMayanCount()
{
    setJulian(mayan_count_to_jd((new Number(document.mayancount.baktun.value)),
                                (new Number(document.mayancount.katun.value)),
                                (new Number(document.mayancount.tun.value)),
                                (new Number(document.mayancount.uinal.value)),
                                (new Number(document.mayancount.kin.value))));
}



/*  setDateToToday  --  Preset the fields in
    the request form to today's date.  */

function setDateToToday()
{
    var today = new Date();
//document.gregorian.year.value = today.getFullYear();
    

    /*  The following idiocy is due to bizarre incompatibilities
        in the behaviour of getYear() between Netscrape and
        Exploder.  The ideal solution is to use getFullYear(),
        which returns the actual year number, but that would
        break this code on versions of JavaScript prior to
        1.2.  So, for the moment we use the following code
        which works for all versions of JavaScript and browsers
        for all year numbers greater than 1000.  When we're willing
        to require JavaScript 1.2, this may be replaced by
        the single line:

           

        Thanks to Larry Gilbert for pointing out this problem.
    */

    document.gregorian.year.value = today.getFullYear();
    document.gregorian.month.selectedIndex = today.getMonth();
    document.gregorian.day.value = today.getDate();
    document.gregorian.hour.value =
    document.gregorian.min.value =
    document.gregorian.sec.value = "00";
}

/*  presetDataToRequest  --  Preset the Gregorian date to the
    	    	    	     date requested by the URL
			     search field.  */
			     
function presetDataToRequest(s)
{
    var eq = s.indexOf("=");
    var set = false;
    if (eq != -1) {
    	var calendar = s.substring(0, eq),
	    date = decodeURIComponent(s.substring(eq + 1));
	if (calendar.toLowerCase() == "gregorian") {
	    var d = date.match(/^(\d+)\D(\d+)\D(\d+)(\D\d+)?(\D\d+)?(\D\d+)?/);
	    if (d != null) {
	    	// Sanity check date and time components
	    	if ((d[2] >= 1) && (d[2] <= 12) &&
		    (d[3] >= 1) && (d[3] <= 31) &&
		    ((d[4] == undefined) ||
		    	((d[4].substring(1) >= 0) && (d[4].substring(1) <= 23))) &&
		    ((d[5] == undefined) ||
		    	((d[5].substring(1) >= 0) && (d[5].substring(1) <= 59))) &&
		    ((d[6] == undefined) ||
		    	((d[6].substring(1) >= 0) && (d[6].substring(1) <= 59)))) {
		    document.gregorian.year.value = d[1];
		    document.gregorian.month.selectedIndex = d[2] - 1;
		    document.gregorian.day.value = Number(d[3]);
		    document.gregorian.hour.value = d[4] == undefined ? "00" :
			d[4].substring(1);
		    document.gregorian.min.value = d[5] == undefined ? "00" :
			d[5].substring(1);
    	    	    document.gregorian.sec.value = d[6] == undefined ? "00" :
			d[6].substring(1);
		    calcGregorian();
		    set = true;
		} else {
	    	    alert("Invalid Gregorian date \"" + date +
			"\" in search request");
		}
	    } else {
	    	alert("Invalid Gregorian date \"" + date +
		    "\" in search request");
	    }
	    
	} else if (calendar.toLowerCase() == "julian") {
	    var d = date.match(/^(\d+)\D(\d+)\D(\d+)(\D\d+)?(\D\d+)?(\D\d+)?/);
	    if (d != null) {
	    	// Sanity check date and time components
	    	if ((d[2] >= 1) && (d[2] <= 12) &&
		    (d[3] >= 1) && (d[3] <= 31) &&
		    ((d[4] == undefined) ||
		    	((d[4].substring(1) >= 0) && (d[4].substring(1) <= 23))) &&
		    ((d[5] == undefined) ||
		    	((d[5].substring(1) >= 0) && (d[5].substring(1) <= 59))) &&
		    ((d[6] == undefined) ||
		    	((d[6].substring(1) >= 0) && (d[6].substring(1) <= 59)))) {
		    document.juliancalendar.year.value = d[1];
		    document.juliancalendar.month.selectedIndex = d[2] - 1;
		    document.juliancalendar.day.value = Number(d[3]);
		    calcJulianCalendar();
		    document.gregorian.hour.value = d[4] == undefined ? "00" :
			d[4].substring(1);
		    document.gregorian.min.value = d[5] == undefined ? "00" :
			d[5].substring(1);
    	    	    document.gregorian.sec.value = d[6] == undefined ? "00" :
			d[6].substring(1);
		    set = true;
		} else {
	    	    alert("Invalid Julian calendar date \"" + date +
			"\" in search request");
		}
	    } else {
	    	alert("Invalid Julian calendar date \"" + date +
		    "\" in search request");
	    }

	} else if (calendar.toLowerCase() == "jd") {
	    var d = date.match(/^(\-?\d+\.?\d*)/);
	    if (d != null) {
	    	setJulian(d[1]);
		set = 1;
	    } else {
	    	alert("Invalid Julian day \"" + date +
		    "\" in search request");
	    }
	    
	} else if (calendar.toLowerCase() == "mjd") {
	    var d = date.match(/^(\-?\d+\.?\d*)/);
	    if (d != null) {
	    	document.modifiedjulianday.day.value = d[1];
	    	calcModifiedJulian();
		set = 1;
	    } else {
	    	alert("Invalid Modified Julian day \"" + date +
		    "\" in search request");
	    }
	    
	} else if (calendar.toLowerCase() == "unixtime") {
	    var d = date.match(/^(\-?\d+\.?\d*)/);
	    if (d != null) {
	    	document.unixtime.time.value = d[1];
	    	calcUnixTime();
		set = 1;
	    } else {
	    	alert("Invalid Modified Julian day \"" + date +
		    "\" in search request");
	    }
	    
	} else if (calendar.toLowerCase() == "iso") {
	    var d;
	    if ((d = date.match(/^(\-?\d+)\-(\d\d\d)/)) != null) {
	    	document.isoday.year.value = d[1];
		document.isoday.day.value= d[2];
	    	calcIsoDay();
		set = 1;
	    } else if ((d = date.match(/^(\-?\d+)\-?W(\d\d)\-?(\d)/i)) != null) {
    	    	document.isoweek.year.value = d[1];
    	    	document.isoweek.week.value = d[2];
    	    	document.isoweek.day.value = d[3];
	    	calcIsoWeek();
		set = 1;
	    } else {
	    	alert("Invalid ISO-8601 date \"" + date +
		    "\" in search request");
	    }
	    
	} else if (calendar.toLowerCase() == "excel") {
	    var d = date.match(/^(\-?\d+\.?\d*)/);
	    if (d != null) {
	    	document.excelserial1900.day.value = d[1];
	    	calcExcelSerial1900();
		set = 1;
	    } else {
	    	alert("Invalid Excel serial day (1900/PC) \"" + date +
		    "\" in search request");
	    }
	    
	} else if (calendar.toLowerCase() == "excel1904") {
	    var d = date.match(/^(\-?\d+\.?\d*)/);
	    if (d != null) {
	    	document.excelserial1904.day.value = d[1];
	    	calcExcelSerial1904();
		set = 1;
	    } else {
	    	alert("Invalid Excel serial day (1904/Mac) \"" + date +
		    "\" in search request");
	    }
	
	} else {
	    alert("Invalid calendar \"" + calendar +
	    	"\" in search request");
	}
    } else {
    	alert("Invalid search request: " + s);
    }
    
    if (!set) {
    	setDateToToday();
	calcGregorian();
    }
}
}