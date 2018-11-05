/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

// Form serializer
function serialize(form) {
    if (!form || form.nodeName !== "FORM") {
        return;
    }var i,
        j,
        q = [];for (i = form.elements.length - 1; i >= 0; i = i - 1) {
        if (form.elements[i].name === "") {
            continue;
        }switch (form.elements[i].nodeName) {case "INPUT":
                switch (form.elements[i].type) {case "text":case "hidden":case "password":case "button":case "reset":case "submit":
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));break;case "checkbox":case "radio":
                        if (form.elements[i].checked) {
                            q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        }break;case "file":
                        break;}break;case "TEXTAREA":
                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));break;case "SELECT":
                switch (form.elements[i].type) {case "select-one":
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));break;case "select-multiple":
                        for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {
                            if (form.elements[i].options[j].selected) {
                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value));
                            }
                        }break;}break;case "BUTTON":
                switch (form.elements[i].type) {case "reset":case "submit":case "button":
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));break;}break;}
    }return q.join("&");
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.toggleCompleted').on('change', function () {
    var row = $(this).closest('tr');
    var completed = $(this).is(':checked');
    $.post('/' + $(this).val() + '/setCompleted', {
        completed: $(this).is(':checked')
    });

    if (completed) {
        row.addClass('completed');
    } else {
        row.removeClass('completed');
    }
});

$('#deleteCompleted').on('click', function () {
    var completedTodos = [];
    $('.toggleCompleted:checked').each(function () {
        completedTodos.push($(this).val());
        $(this).closest('tr').remove();
    });

    $.post('/deleteCompleted', {
        toDelete: completedTodos
    });
});

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
module.exports = __webpack_require__(1);


/***/ })
/******/ ]);