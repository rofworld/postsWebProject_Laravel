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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/uploadController.js":
/*!******************************************!*\
  !*** ./resources/js/uploadController.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$("#fileUploadButton").click(function () {
  $("#videoFile").click();
});
$('#videoFile').on('change', function () {
  if ($("#videoFile")[0].files.length > 0) {
    var fileName = $("#videoFile")[0].files[0].name;
    console.log(fileName);
    $("#filePath").text(fileName);
  } else {
    $("#filePath").text("");
  }
});
/*$("#addButton").click(function() {
	if ($("#videoFile")[0].files.length>0){
		var fileName = $("#videoFile")[0].files[0].name;
		console.log("fileName = " + $("#videoFile")[0].files[0].name + ". File Size = " + $("#videoFile")[0].files[0].size);
		if (isVideo(fileName)){
			//console.log("Is video");
  				if ($("#videoFile")[0].files[0].size < 120000000){
      				
					 
					  
						var fd = new FormData();
						fd.append("videoFile", $("#videoFile")[0].files[0]);
						
						$.ajaxSetup({
							headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
						request = $.ajax({
							url: "insertVideo",
                                  type: "post",
                                  processData: false,
                                  contentType: false,
                                  cache:false,
							data: fd
							
						});
								// Callback handler that will be called on success
						request.done(function (response, textStatus, jqXHR){
                                  console.log(response);
                                  console.log(textStatus);
                                  $('#status').css('visibility','visible');
  								$('#status').html(response);
						});
								request.fail(function (jqXHR, textStatus, errorThrown){
								// Log the error to the console
								console.error(
								"The following error occurred: "+
								textStatus, errorThrown
								);
						});

      					
  				}else{
  					alert("The video size is over 120Mbytes")
  				}
		}else{
			alert("The file selected is not a valid video");
		}
		
  			
			}else{
  			alert("There is no file selected");
	}
			function getExtension(filename) {
	    var parts = filename.split('.');
	    return parts[parts.length - 1];
	}
			function isVideo(filename) {
	    var ext = getExtension(filename);
	    switch (ext.toLowerCase()) {
	    case 'mp4':
	    case 'ogv':
	    case 'webm':
	        // etc
	        return true;
	    }
	    return false;
	}
	function openDialog() {
              
		$(".popup-overlay, .popup-content").addClass("active");
                  
          }
          
          function closeDialog() {
          	$(".popup-overlay, .popup-content").removeClass("active");
          }
});
	
      */

(function () {
  var bar = $('.bar');
  var percent = $('.percent'); //var status = $('#status');

  $('form').ajaxForm({
    beforeSend: function beforeSend() {
      //status.empty();
      var percentVal = '0%';
      var posterValue = $('input[name=file]').fieldValue();
      bar.width(percentVal);
      percent.html(percentVal);
    },
    uploadProgress: function uploadProgress(event, position, total, percentComplete) {
      var percentVal = percentComplete + '%';
      bar.width(percentVal);
      percent.html(percentVal);
    },
    success: function success() {
      var percentVal = 'Wait, Saving';
      bar.width(percentVal);
      percent.html(percentVal);
    },
    complete: function complete(xhr) {
      var percentVal = 'Completed';
      bar.width(percentVal);
      percent.html(percentVal);
      $('#validation-errors').html('');
      $('#status').html('');

      if (xhr.responseJSON.status) {
        console.log('<div class="alert alert-success">' + xhr.responseJSON.status + '</div>');
        $('#status').append('<div class="alert alert-success">' + xhr.responseJSON.status + '</div>');
      }

      $.each(xhr.responseJSON.errors, function (key, value) {
        console.log('<div class="alert alert-danger">' + value + '</div>');
        $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div>');
      });
    }
  });
})();

/***/ }),

/***/ 2:
/*!************************************************!*\
  !*** multi ./resources/js/uploadController.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Samsung\eclipse-workspace-oxygen\postsWebProject_laravel\resources\js\uploadController.js */"./resources/js/uploadController.js");


/***/ })

/******/ });