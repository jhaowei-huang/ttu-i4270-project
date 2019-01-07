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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/auth/signIn.js":
/*!*************************************!*\
  !*** ./resources/js/auth/signIn.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function waiting() {
  var status = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;

  if (status) {
    // 等待資料傳輸中
    $('.validation-area').text('驗證中，請稍後');
    $('.alert').css('display', 'block').addClass('d-flex');
    $('input').prop('disabled', true);
    $('#btn-submit').prop('disabled', true);
  } else {
    // 資料傳輸完畢
    $('.input-invalid').removeClass('input-invalid');
    $('.validation-area').text('');
    $('.alert').css('display', 'none').removeClass('d-flex');
    $('input').prop('disabled', false);
    $('#btn-submit').prop('disabled', false);
  }
}

function invalidInput(errors) {
  for (var key in errors) {
    if (errors[key] !== '' && errors.hasOwnProperty(key)) {
      $('.validation-area').append(errors[key] + '\n');
      $('#' + key).addClass('input-invalid');
    }
  }
}

function success(response) {
  try {
    if (response.errors === null || response.errors.length === 0) {
      // 登入憑證正確，跳轉至指定頁面
      window.location.href = response.redirect;
    } else {
      waiting(false);
      invalidInput(response.errors);
    }
  } catch (e) {
    console.log(e);
    console.log(response);
    waiting(false);
  }
}

function error(jqXHR, exception) {
  waiting(false);

  if (jqXHR.status === 422) {
    // 狀態422為Laravel預設的表單驗證錯誤狀態
    var errors = jqXHR.responseJSON.errors;
    invalidInput(errors);
  } else {
    $('.validation-area').append(jqXHR.status, '：伺服器錯誤');
  }
}

$(document).ready(function () {
  $('#form-signIn').on('submit', function (e) {
    // 停用預設的遞送表單，預設的會導致頁面刷新
    e.preventDefault(); // disabled的欄位無法使用jquery serialize函式，故需要先儲存表單資訊

    var data = $('#form-signIn').serialize();
    waiting(); // 使用ajax遞送表單，避免頁面刷新

    ajax('POST', '/signIn', data, success, error);
  });
});

/***/ }),

/***/ 5:
/*!*******************************************!*\
  !*** multi ./resources/js/auth/signIn.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\workspace\php\ttu-i4270-project\resources\js\auth\signIn.js */"./resources/js/auth/signIn.js");


/***/ })

/******/ });