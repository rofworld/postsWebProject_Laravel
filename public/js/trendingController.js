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

/***/ "./resources/js/trendingController.js":
/*!********************************************!*\
  !*** ./resources/js/trendingController.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('[type=radio]').change(function () {
  /* find id */
  var id = $(this).parent().parent().parent().parent().find(".idVideo").html();
  console.log(id);
  var votedIDS = "[]"; //Examine wether SessionStorage is set

  if (localStorage.getItem('votedIDS') != null) {
    var votedIDS = localStorage.getItem('votedIDS');
  }

  console.log("This are the already voted IDS:");
  console.log(votedIDS);
  var isVoted = false;
  votedIDS = JSON.parse(votedIDS);
  console.log("Recorriendo Array"); //Examine if the post is already voted

  for (var x = 0; x < votedIDS.length; x++) {
    console.log(votedIDS[x]);

    if (votedIDS[x] == id) {
      isVoted = true;
    }
  }

  console.log("is Voted = " + isVoted);

  if (isVoted == false) {
    var params = {
      id: id,
      rate: this.value
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    request = $.ajax({
      url: "insertVideoRate",
      type: "post",
      data: params
    }); // Callback handler that will be called on success

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      console.log(textStatus); //push array

      votedIDS.push(id); //Set SessionStorage

      localStorage.setItem('votedIDS', JSON.stringify(votedIDS));
      location.reload();
    });
    request.fail(function (jqXHR, textStatus, errorThrown) {
      // Log the error to the console
      console.error("The following error occurred: " + textStatus, errorThrown);
    });
  } else {
    alert('You already voted for this id');
  }
});

/***/ }),

/***/ 1:
/*!**************************************************!*\
  !*** multi ./resources/js/trendingController.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Samsung\eclipse-workspace-oxygen\postsWebProject_laravel\resources\js\trendingController.js */"./resources/js/trendingController.js");


/***/ })

/******/ });