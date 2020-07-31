/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/calendar.js":
/*!**********************************!*\
  !*** ./resources/js/calendar.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(document).ready(function () {
  var _$$fullCalendar;

  var SITEURL = "{{url('/')}}";
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var calendar = $('#calendar').fullCalendar((_$$fullCalendar = {
    editable: true,
    events: SITEURL + "/event",
    displayEventTime: true
  }, _defineProperty(_$$fullCalendar, "editable", true), _defineProperty(_$$fullCalendar, "eventRender", function eventRender(event, element, view) {
    if (event.allDay === 'true') {
      event.allDay = true;
    } else {
      event.allDay = false;
    }
  }), _defineProperty(_$$fullCalendar, "selectable", false), _defineProperty(_$$fullCalendar, "selectHelper", true), _defineProperty(_$$fullCalendar, "select", function select(start, end, allDay) {
    var title = prompt('Event Title:');

    if (title) {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
        url: SITEURL + "/event/create",
        data: 'title=' + title + '&start=' + start + '&end=' + end,
        type: "POST",
        success: function success(data) {
          displayMessage("Added Successfully");
        }
      });
      calendar.fullCalendar('renderEvent', {
        title: title,
        start: start,
        end: end,
        allDay: allDay
      }, true);
    }

    calendar.fullCalendar('unselect');
  }), _defineProperty(_$$fullCalendar, "eventDrop", function eventDrop(event, delta) {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
    $.ajax({
      url: SITEURL + '/event/update',
      data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
      type: "POST",
      success: function success(response) {
        displayMessage("Updated Successfully");
      }
    });
  }), _defineProperty(_$$fullCalendar, "eventClick", function eventClick(event) {
    var deleteMsg = confirm("Do you really want to delete?");

    if (deleteMsg) {
      $.ajax({
        type: "POST",
        url: SITEURL + '/event/delete',
        data: "&id=" + event.id,
        success: function success(response) {
          if (parseInt(response) > 0) {
            $('#calendar').fullCalendar('removeEvents', event.id);
            displayMessage("Deleted Successfully");
          }
        }
      });
    }
  }), _$$fullCalendar));
});

function displayMessage(message) {
  $(".response").html("" + message + "");
  setInterval(function () {
    $(".success").fadeOut();
  }, 1000);
}

/***/ }),

/***/ 1:
/*!****************************************!*\
  !*** multi ./resources/js/calendar.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/c/Users/nazam/Desktop/source/Calendrier/resources/js/calendar.js */"./resources/js/calendar.js");


/***/ })

/******/ });