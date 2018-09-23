/*
 * This file is part of YoHours.
 * 
 * YoHours is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 * 
 * YoHours is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with YoHours.  If not, see <http://www.gnu.org/licenses/>.
 */

/*
 * YoHours
 * Web interface to make opening hours data for OpenStreetMap the easy way
 * Author: Adrien PAVIE
 *
 * View JS classes
 */

/**
 * The date range modal component
 */
var DateRangeView = function(main) {
//ATTRIBUTES
	/** Is the modal shown to edit some date range ? True = edit, false = add */
	this._editMode = false;
	
	/** Date range type **/
	this._rangeType = null;
	
	/** The main view **/
	this._mainView = main;

//CONSTRUCTOR
	$("#modal-range-valid").click(this.valid.bind(this));
};

//MODIFIERS
	/**
	 * Shows the modal
	 * @param edit Edit mode ? (optional)
	 */
	DateRangeView.prototype.show = function(edit) {
		this._editMode = edit || false;
		
		//Reset navigation
		$("#modal-range-nav li").removeClass("active");
		$("#modal-range-form > div").hide();
		$("#modal-range-alert").hide();
		
		//Reset inputs
		$("#range-day-startday").val("");
		$("#range-day-startmonth").val(1);
		$("#range-day-endday").val("");
		$("#range-day-endmonth").val(0);
		$("#range-week-start").val(1);
		$("#range-week-end").val("");
		$("#range-month-start").val(1);
		$("#range-month-end").val(0);
		$("input[name=range-holiday-type]").prop("checked", false);
		$("#range-copy").hide();
		$("#range-copy-box").attr("checked", true);
		
		//Edit interval
		if(this._editMode) {
			//Show modes that defines week or day only, depending of previous typical
			if(this._mainView.getCalendarView().getDateRange().definesTypicalWeek()) {
				$("#modal-range-nav-always").show();
				$("#modal-range-nav-month").show();
				$("#modal-range-nav-week").show();
				$("#range-day-end").show();
				$("#range-day .text-info").hide();
				$("#range-holiday-sh").show();
				$("#range-holiday-ph").hide();
				$("#range-holiday-easter").hide();
			}
			else {
				$("#modal-range-nav-always").hide();
				$("#modal-range-nav-month").hide();
				$("#modal-range-nav-week").hide();
				$("#range-day-end").hide();
				$("#range-day .text-info").hide();
				$("#range-holiday-sh").hide();
				$("#range-holiday-ph").show();
				$("#range-holiday-easter").show();
			}
			
			var start = this._mainView.getCalendarView().getDateRange().getInterval().getStart();
			var end = this._mainView.getCalendarView().getDateRange().getInterval().getEnd();
			var type = this._mainView.getCalendarView().getDateRange().getInterval().getType();
			
			switch(type) {
				case "day":
					$("#range-day-startday").val(start.day);
					$("#range-day-startmonth").val(start.month);
					if(end != null) {
						$("#range-day-endday").val(end.day);
						$("#range-day-endmonth").val(end.month);
					}
					else {
						$("#range-day-endday").val("");
						$("#range-day-endmonth").val(0);
					}
					break;

				case "week":
					$("#range-week-start").val(start.week);
					if(end != null) {
						$("#range-week-end").val(end.week);
					}
					else {
						$("#range-week-end").val("");
					}
					break;

				case "month":
					$("#range-month-start").val(start.month);
					if(end != null) {
						$("#range-month-end").val(end.month);
					}
					else {
						$("#range-month-end").val(0);
					}
					break;

				case "holiday":
					$("input[name=range-holiday-type]").prop("checked", false);
					$("input[name=range-holiday-type][value="+start.holiday+"]").prop("checked", true);
					break;

				case "always":
					break;
			}
			
			$("#modal-range-nav-"+type).addClass("active");
			$("#range-"+type).show();
		}
		//New wide interval
		else {
			//Show all inputs
			$("#modal-range-nav-always").show();
			$("#modal-range-nav-month").show();
			$("#modal-range-nav-week").show();
			$("#range-day-end").show();
			$("#range-day .text-info").show();
			$("#range-holiday > div > label").show();
			
			//Set first tab as active
			$("#modal-range-nav li:first").addClass("active");
			this._rangeType = $("#modal-range-nav li:first").attr("id").substr("modal-range-nav-".length);
			
			if(this._rangeType != "always") {
				$("#range-copy").show();
			}
			
			//Show associated div
			$("#modal-range-form > div:first").show();
		}
		
		$("#modal-range").modal("show");
	};
	
	/**
	 * Changes the currently shown tab
	 */
	DateRangeView.prototype.tab = function(type) {
		$("#modal-range-nav li.active").removeClass("active");
		$("#modal-range-nav-"+type).addClass("active");
		$("#modal-range-form > div:visible").hide();
		$("#range-"+type).show();
		$("#modal-range-alert").hide();
		this._rangeType = type;
		
		if(this._rangeType != "always" && !this._editMode) {
			$("#range-copy").show();
		}
		else {
			$("#range-copy").hide();
		}
	};
	
	/**
	 * Actions to perform when the modal was validated
	 */
	DateRangeView.prototype.valid = function() {
		//Create start and end objects
		var wInterval, startVal, endVal, startVal2, endVal2;
		
		try {
			switch(this._rangeType) {
				case "month":
					//Start
					startVal = parseInt($("#range-month-start").val(),10);
					if(isNaN(startVal)) { throw new Error("Invalid start month"); }
					
					//End
					endVal = parseInt($("#range-month-end").val(),10);
					if(!isNaN(endVal) && endVal > 0) {
						wInterval = new WideInterval().month(startVal, endVal);
					}
					else {
						wInterval = new WideInterval().month(startVal);
					}
					
					break;
				case "week":
					//Start
					startVal = parseInt($("#range-week-start").val(),10);
					if(isNaN(startVal) || startVal < 1) { throw new Error("Invalid start week"); }
					
					//End
					endVal = parseInt($("#range-week-end").val(),10);
					if(!isNaN(endVal) && endVal > 0) {
						wInterval = new WideInterval().week(startVal, endVal);
					}
					else {
						wInterval = new WideInterval().week(startVal);
					}
					
					break;
				case "day":
					//Start
					startVal = parseInt($("#range-day-startday").val(),10);
					if(isNaN(startVal) || startVal < 1) { throw new Error("Invalid start day"); }
					startVal2 = parseInt($("#range-day-startmonth").val(),10);
					if(isNaN(startVal2) || startVal2 < 1) { throw new Error("Invalid start month"); }
					
					//End
					endVal = parseInt($("#range-day-endday").val(),10);
					endVal2 = parseInt($("#range-day-endmonth").val(),10);
					if(!isNaN(endVal) && endVal > 0 && !isNaN(endVal2) && endVal2 > 0) {
						wInterval = new WideInterval().day(startVal, startVal2, endVal, endVal2);
					}
					else if(this._editMode && this._mainView.getCalendarView().getDateRange().definesTypicalWeek()) {
						throw new Error("Missing end day");
					}
					else {
						wInterval = new WideInterval().day(startVal, startVal2);
					}
					
					break;
				case "holiday":
					startVal = $("input[name=range-holiday-type]:checked").val();
					if(startVal != "PH" && startVal != "SH" && startVal != "easter") { throw new Error("Invalid holiday type"); }
					wInterval = new WideInterval().holiday(startVal);
					
					break;

				case "always":
				default:
					wInterval = new WideInterval().always();
			}
			
			//Check if not overlapping another date range
			var overlap = false;
			var ranges = this._mainView.getController().getDateRanges();
			var l = ranges.length, i=0;
			var generalRange = -1; //Wider date range which can be copied if needed
			
			while(i < l) {
				if(ranges[i] != undefined && ranges[i].getInterval().equals(wInterval)) {
					throw new Error("This time range is identical to another one");
				}
				else {
					if(ranges[i] != undefined && ranges[i].isGeneralFor(new DateRange(wInterval))) {
						generalRange = i;
					}
					i++;
				}
			}
			
			//Edit currently shown calendar
			if(this._editMode) {
				this._mainView.getCalendarView().getDateRange().updateRange(wInterval);
				this._mainView.getCalendarView().show(this._mainView.getCalendarView().getDateRange());
				this._mainView.refresh();
			}
			//Create new calendar
			else {
				//Copy wider date range intervals
				if($("#range-copy-box").is(":checked") && generalRange >= 0) {
					this._mainView.getCalendarView().show(this._mainView.getController().newRange(wInterval, ranges[generalRange].getTypical().getIntervals()));
				}
				else {
					this._mainView.getCalendarView().show(this._mainView.getController().newRange(wInterval));
				}
			}
			$("#modal-range").modal("hide");
		}
		catch(e) {
			$("#modal-range-alert").show();
			$("#modal-range-alert-label").html(e);
			console.error(e);
		}
	};



/**
 * The calendar view, with its navigation bar
 */
var CalendarView = function(main) {
//ATTRIBUTES
	/** The main view **/
	this._mainView = main;
	
	/** The currently shown date range **/
	this._dateRange = null;

//CONSTRUCTOR
	$("#range-edit").click(function() { this._mainView.getDateRangeView().show(true); }.bind(this));
	$("#range-delete").click(function() {
		this._mainView.getController().deleteCurrentRange();
		this._mainView.getCalendarView().show(this._mainView.getController().getFirstDateRange());
	}.bind(this));
	$("#range-nav-new").click(function() { this._mainView.getDateRangeView().show(false); }.bind(this))
};

//ACCESSORS
	/**
	 * @return The currently shown date range
	 */
	CalendarView.prototype.getDateRange = function() {
		return this._dateRange;
	};

//MODIFIERS
	/**
	 * Updates the date range navigation bar
	 */
	CalendarView.prototype.updateRangeNavigationBar = function() {
		//Remove previous tabs
		$("#range-nav li.rnav").remove();
		
		//Create tabs
		var dateRanges = this._mainView.getController().getDateRanges();
		var dateRange;
		var navHtml = '';
		for(var i=0, l=dateRanges.length; i < l; i++) {
			dateRange = dateRanges[i];
			if(dateRange != undefined) {
				timeName = dateRange.getInterval().getTimeSelector();
				if(timeName.length == 0) { timeName = "Весь год"; }
				navHtml += '<li role="presentation" id="range-nav-'+i+'" class="rnav';
				if(dateRange === this._dateRange) { navHtml += ' active'; }
				navHtml += '"><a data-tab="'+i+'">'+timeName+'</a></li>';
			}
		}
		
		//Add to DOM
		$("#range-nav").prepend(navHtml);
	};
	
	/**
	 * Updates the label showing the human readable date range
	 */
	CalendarView.prototype.updateDateRangeLabel = function() {
		$("#range-txt-label").html(this._dateRange.getInterval().getTimeForHumans());
	};
	
	/**
	 * Click handler for navigation tabs
	 * @param id The date range id to show
	 */
	CalendarView.prototype.tab = function(id) {
		this.show(this._mainView.getController().getDateRanges()[id]);
		$("#range-nav li.active").removeClass("active");
		$("#range-nav-"+id).addClass("active");
	};
	
	/**
	 * Displays the given typical week or day
	 * @param dateRange The date range to display
	 */
	CalendarView.prototype.show = function(dateRange) {
		this._dateRange = dateRange;
		$("#calendar").fullCalendar('destroy');
		
		var intervals = this._dateRange.getTypical().getIntervals();
		var events = [];
		var interval, weekId, eventData, to, eventConstraint, defaultView, colFormat;
		var fctSelect, fctEdit;
		
		/*
		 * Variables depending of the kind of typical day/week
		 */
		//Week
		if(this._dateRange.definesTypicalWeek()) {
			//Create intervals array
			for(var i = 0; i < intervals.length; i++) {
				interval = intervals[i];
				
				if(interval != undefined) {
					//Single minute event
					if(interval.getStartDay() == interval.getEndDay() && interval.getFrom() == interval.getTo()) {
						to = moment().startOf("isoweek").day("Monday").hour(0).minute(0).second(0).milliseconds(0).add(interval.getEndDay(), 'days').add(interval.getTo()+1, 'minutes');
					}
					else {
						to = moment().startOf("isoweek").day("Monday").hour(0).minute(0).second(0).milliseconds(0).add(interval.getEndDay(), 'days').add(interval.getTo(), 'minutes');
					}
					
					//Add event on calendar
					eventData = {
						id: i,
						start: moment().startOf("isoweek").day("Monday").hour(0).minute(0).second(0).milliseconds(0).add(interval.getStartDay(), 'days').add(interval.getFrom(), 'minutes'),
						end: to,
					};
					events.push(eventData);
				}
			}
			
			eventConstraint = { start: moment().startOf("isoweek").day("Monday").format("YYYY-MM-DD[T00:00:00]"), end: moment().startOf("isoweek").day("Monday").add(7, "days").format("YYYY-MM-DD[T00:00:00]") };
			defaultView = "agendaWeek";
			colFormat = (this._mainView.isMinimal()) ? "dd" : "dddd";
			fctSelect = function(start, end) {
				//Add event to week intervals
				var minStart = parseInt(start.format("H"),10) * 60 + parseInt(start.format("m"),10);
				var minEnd = parseInt(end.format("H"),10) * 60 + parseInt(end.format("m"),10);
				var dayStart = swDayToMwDay(start.format("d"));
				var dayEnd = swDayToMwDay(end.format("d"));
				
				//All day interval
				if(minStart == 0 && minEnd == 0 && dayEnd - dayStart >= 1) {
					minEnd = MINUTES_MAX;
					dayEnd--;
				}
				
				var weekId = this._dateRange.getTypical().addInterval(
					new Interval(
						dayStart,
						dayEnd,
						minStart,
						minEnd
					)
				);
				
				//Add event on calendar
				eventData = {
					id: weekId,
					start: start,
					end: end
				};
				
				$('#calendar').fullCalendar('renderEvent', eventData, true);
				
				this._mainView.refresh();
				
				//Simulate click event to display resizer
				this.simulateClick();
			}.bind(this);
			
			fctEdit = function(event, delta, revertFunc, jsEvent, ui, view) {
				var minStart = parseInt(event.start.format("H"),10) * 60 + parseInt(event.start.format("m"),10);
				var minEnd = parseInt(event.end.format("H"),10) * 60 + parseInt(event.end.format("m"),10);
				var dayStart = swDayToMwDay(event.start.format("d"));
				var dayEnd = swDayToMwDay(event.end.format("d"));
				
				//All day interval
				if(minStart == 0 && minEnd == 0 && dayEnd - dayStart >= 1) {
					minEnd = MINUTES_MAX;
					dayEnd--;
				}
				
				this._dateRange.getTypical().editInterval(
					event.id,
					new Interval(
						dayStart,
						dayEnd,
						minStart,
						minEnd
					)
				);
				this._mainView.refresh();
			}.bind(this);
		}
		//Day
		else {
			//Create intervals array
			for(var i = 0; i < intervals.length; i++) {
				interval = intervals[i];
				
				if(interval != undefined) {
					//Single minute event
					if(interval.getFrom() == interval.getTo()) {
						to = moment().hour(0).minute(0).second(0).milliseconds(0).add(interval.getTo()+1, 'minutes');
					}
					else {
						to = moment().hour(0).minute(0).second(0).milliseconds(0).add(interval.getTo(), 'minutes');
					}
					
					//Add event on calendar
					eventData = {
						id: i,
						start: moment().hour(0).minute(0).second(0).milliseconds(0).add(interval.getFrom(), 'minutes'),
						end: to
					};
					events.push(eventData);
				}
			}
			
			eventConstraint = { start: moment().format("YYYY-MM-DD[T00:00:00]"), end: moment().add(1, "days").format("YYYY-MM-DD[T00:00:00]") };
			defaultView = "agendaDay";
			colFormat = "[Day]";
			fctSelect = function(start, end) {
				//Add event to week intervals
				var minStart = parseInt(start.format("H",10)) * 60 + parseInt(start.format("m"),10);
				var minEnd = parseInt(end.format("H"),10) * 60 + parseInt(end.format("m"),10);
				var weekId = this._dateRange.getTypical().addInterval(
					new Interval(
						0,
						0,
						minStart,
						minEnd
					)
				);
				
				//Add event on calendar
				eventData = {
					id: weekId,
					start: start,
					end: end
				};
				$('#calendar').fullCalendar('renderEvent', eventData, true);
				
				this._mainView.refresh();
				
				//Simulate click event to display resizer
				this.simulateClick();
			}.bind(this);
			
			fctEdit = function(event, delta, revertFunc, jsEvent, ui, view) {
				var minStart = parseInt(event.start.format("H"),10) * 60 + parseInt(event.start.format("m"),10);
				var minEnd = parseInt(event.end.format("H"),10) * 60 + parseInt(event.end.format("m"),10);
				this._dateRange.getTypical().editInterval(
					event.id,
					new Interval(
						0,
						0,
						minStart,
						minEnd
					)
				);
				this._mainView.refresh();
			}.bind(this);
		}
		
		//Create calendar
		$("#calendar").fullCalendar({
			header: {
				left: '',
				center: '',
				right: ''
			},
			defaultView: defaultView,
			editable: true,
			height: "auto",
			columnFormat: colFormat,
			timeFormat: 'HH:mm',
			axisFormat: 'HH:mm',
			allDayText: '24/24',
			allDaySlot: false,
			slotDuration: '00:15:00',
			firstDay: 1,
			eventOverlap: false,
			events: events,
			eventConstraint: eventConstraint,
			selectable: true,
			selectHelper: true,
			selectOverlap: false,
			select: fctSelect,
			eventClick: function(calEvent, jsEvent, view) {
				this._dateRange.getTypical().removeInterval(calEvent._id);
				$('#calendar').fullCalendar('removeEvents', calEvent._id);
				this._mainView.refresh();
			}.bind(this),
			eventResize: fctEdit,
			eventDrop: fctEdit,
			locale: 'ru'
		});
		
		this.updateDateRangeLabel();
		this.updateRangeNavigationBar();
	};
	
	/**
	 * Simulates a mouse click over the calendar
	 */
	CalendarView.prototype.simulateClick = function() {
		var $el = $("#calendar");
		var offset = $el.offset();
		var event = jQuery.Event("mousedown", {
			which: 1,
			pageX: offset.left,
			pageY: offset.top
		});
		$el.trigger(event);
	};



/**
 * The URL manager
 */
var URLView = function(main) {
//ATTRIBUTES
	/** The main view **/
	this._mainView = main;
};
	
//ACCESSORS
	/**
	 * @return The opening_hours value in URL, or undefined
	 */
	URLView.prototype.getOpeningHours = function() {
		return (this._getParameters().oh != undefined) ? decodeURIComponent(this._getParameters().oh) : "";
	};

//MODIFIERS
	/**
	 * Updates the URL with the given opening_hours value
	 * @param oh The new value
	 */
	URLView.prototype.update = function(oh) {
		// var params = (oh != undefined && oh.trim().length > 0) ? "oh="+oh.trim() : "";
		// var hash = this._getUrlHash();
		
		// var allOptions = params + ((hash != "") ? '#' + hash : "");
		// var link = this._getUrl() + ((allOptions.length > 0) ? "?" + allOptions : "" );
		
		// window.history.replaceState({}, "YoHours", link);
	};

//OTHER METHODS
	/**
	 * @return The URL parameters as an object
	 */
	URLView.prototype._getParameters = function() {
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		var params = new Object();
		
		for (var i = 0; i < sURLVariables.length; i++) {
			var sParameterName = sURLVariables[i].split('=');
			params[sParameterName[0]] = sParameterName[1];
		}
		
		return params;
	};
	
	/**
	 * @return The page base URL
	 */
	URLView.prototype._getUrl = function() {
		return $(location).attr('href').split('?')[0];
	};
	
	/**
	 * @return The URL hash
	 */
	URLView.prototype._getUrlHash = function() {
		var hash = $(location).attr('href').split('#')[1];
		return (hash != undefined) ? hash : "";
	};



/**
 * The opening hours text input field
 */
var HoursInputView = function(main) {
//ATTRIBUTES
	/** The main view **/
	this._mainView = main;

	/** The input field **/
	this._field = $("#oh");
	
	/** The delay to wait before trying to parse input **/
	this._delay = 700;
	
	/** The timer **/
	this._timer;
	
	/** The URL view **/
	this._vUrl = new URLView(main);
	
//CONSTRUCTOR
	//Get opening_hours from URL
	//var urlOh = this._vUrl.getOpeningHours();
	var urlOh = this._field.val();
	if(urlOh != undefined) {
		//Handle special case of parameter passed with '+' instead of ' ' delimiter
		if(urlOh.split("+").length > urlOh.split(" ").length) {
			urlOh = urlOh.replace(/([0-9]{2})\+$/g, "$1#ownplus#"); //Things like "22:00+" at the end of the line
			urlOh = urlOh.replace(/([0-9]{2})\+([^A-Za-z0-9])/g, "$1#ownplus#$2"); //Things like "22:00+" followed by any not alpha-numeric char
			urlOh = urlOh.replace(/\+\+([0-9])/g, " #ownplus#$1"); //Things like " +2 days"
			urlOh = urlOh.replace(/\+/g, " "); //All remaining spaces
			urlOh = urlOh.replace("#ownplus#", "+"); //Custom '+'
		}
		this.setValue(urlOh);
	}
	else {
		this.setValue("");
	}
	
	//Add triggers
	this._field.bind("input propertychange", function() {
		window.clearTimeout(this._timer);
		this._timer = window.setTimeout(
			this.changed.bind(this),
			this._delay
		);
	}.bind(this));
	this._field.keydown(function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
			window.clearTimeout(this._timer);
			this.changed();
		}
	}.bind(this));
};

//ACCESSORS
	/**
	 * @return The opening_hours value
	 */
	HoursInputView.prototype.getValue = function() {
		return this._field.val();
	};
	
//MODIFIERS
	/**
	 * Changes the input value
	 */
	HoursInputView.prototype.setValue = function(val) {
		if(val != this._field.val()) {
			this._field.val(val);
			this._vUrl.update(val);
		}
	};
	
	/**
	 * Sets if the contained value is correct or not
	 * @param valid Is the value valid
	 * @param ohValid Is the value valid according to opening_hours.js
	 */
	HoursInputView.prototype.setValid = function(valid, ohValid) {
		ohValid = ohValid || null;
		
		$("#oh-valid-alert").addClass("hide");
		
		if(valid) {
			$("#oh-form").removeClass("has-error");
		}
		else {
			$("#oh-form").addClass("has-error");
			if(ohValid) {
				$("#oh-valid-alert").removeClass("hide");
				$("#oh-valid-alert a").attr("href", "http://openingh.openstreetmap.de/evaluation_tool/?EXP="+this._field.val());
			}
		}
	};
	
	/**
	 * Called when input value changed to check it, and update calendar
	 */
	HoursInputView.prototype.changed = function() {
		var caretPos = this._field.caret();
		this._field.val(this._field.val().replace(/вђЈ/gi, ' ')); //Allow to paste directly from Taginfo
		this._vUrl.update(this._field.val());
		this._mainView.getController().showHours(this._field.val());
		this._field.caret(caretPos);
	};



/**
 * MainView, view class for the main page
 * @param ctrl The MainController
 */
var MainView = function(ctrl) {
//ATTRIBUTES
	/** The application controller **/
	this._ctrl = ctrl;
	
	/** The week view **/
	this._calendarView = new CalendarView(this);
	
	/** The hours input view **/
	this._hoursInputView = new HoursInputView(this);
	
	/** The date range modal **/
	this._dateRangeView = new DateRangeView(this);
	
	/** The help dialog **/
	this._helpView = null;
	
	/** Is the view in minimal mode ? **/
	this._minimal = false;
};

//ACCESSORS
	/**
	 * @return The hours input view
	 */
	MainView.prototype.getHoursInputView = function() {
		return this._hoursInputView;
	};
	
	/**
	 * @return The date range view
	 */
	MainView.prototype.getDateRangeView = function() {
		return this._dateRangeView;
	};
	
	/**
	 * @return The calendar view
	 */
	MainView.prototype.getCalendarView = function() {
		return this._calendarView;
	};
	
	/**
	 * @return The controller
	 */
	MainView.prototype.getController = function() {
		return this._ctrl;
	};
	
	/**
	 * Minimal mode ?
	 */
	MainView.prototype.isMinimal = function() {
		return this._minimal;
	};

//OTHER METHODS
	/**
	 * Initializes the view
	 * @param minimal Is the view in minimal mode (iframe) ?
	 */
	MainView.prototype.init = function(minimal) {
		var ohInputVal = this._hoursInputView.getValue();
		this._minimal = minimal || false;
		if(ohInputVal != undefined && ohInputVal.trim() != "") {
			this._ctrl.showHours(ohInputVal);
		}
		else {
			this._calendarView.show(this._ctrl.getFirstDateRange());
		}
		
		//Init help dialog
		this._helpView = $("#modal-help");
		$("#help-link").click(function() { this._helpView.modal("show"); }.bind(this));
		
		$("#oh-clear").click(function() { this._ctrl.clear(); }.bind(this));
	};
	
	/**
	 * Refreshes the view
	 */
	MainView.prototype.refresh = function() {
		this._hoursInputView.setValue(this._ctrl.getOpeningHours());
	};