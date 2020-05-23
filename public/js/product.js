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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./Resources/assets/js/app.js":
/*!************************************!*\
  !*** ./Resources/assets/js/app.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

$eventselect = $(".sub_category_id");

var ProductCreate = /*#__PURE__*/function () {
  function ProductCreate() {
    _classCallCheck(this, ProductCreate);
  }

  _createClass(ProductCreate, [{
    key: "initFileUpload",
    value: function initFileUpload() {
      $('#updatefile').change(function () {
        var file_data = $('#updatefile').prop('files')[0];
        var product_id = $('#product_id').val();
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: route('product.upload', product_id),
          type: "POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function success(data) {
            console.log(data.image);
            $('.custom-change-image').attr('src', '');
            $('.custom-change-image').attr('src', data.image);
          }
        });
      });
    }
  }]);

  return ProductCreate;
}();

var create = new ProductCreate();
$(document).ready(function () {
  create.initFileUpload(); // $('.category_id').trigger('change');
});
$(".category_id").on("change", function (e) {
  var res = $.ajax({
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: route('subcategory.fetch'),
    data: {
      category_id: $('.category_id').val()
    } // data: function(params) {
    //     var query = {
    //         search: params.term,
    //         category_id: $('.category_id').val(),
    //     };
    // Query parameters will be ?search=[term]&type=public

  });
  res.done(function (data) {
    // $("#sub_category_id").remove();
    $("#sub_category_id").html('');
    $('#sub_category_id').select2();
    $('#sub_category_id').select2({
      'data': null
    });
    console.log(data.results);
    $("#sub_category_id").select2({
      data: data.results
    });
  });
});
$image_crop = $('#image_demo').croppie({
  enableExif: true,
  viewport: {
    width: 200,
    height: 200,
    type: 'square' //circle

  },
  boundary: {
    width: 300,
    height: 300
  }
});
$('#upload_image').on('change', function () {
  var reader = new FileReader();

  reader.onload = function (event) {
    $image_crop.croppie('bind', {
      url: event.target.result
    }).then(function () {
      console.log('jQuery bind complete');
    });
  };

  reader.readAsDataURL(this.files[0]);
  $('#uploadimageModal').modal('show');
});
$('.crop_image').click(function (event) {
  $image_crop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (response) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: route('temp.product.upload'),
      type: "POST",
      data: {
        "image": response
      },
      success: function success(data) {
        $('#uploadimageModal').modal('hide');
        $('#uploaded_image').html(data);
      }
    });
  });
});

/***/ }),

/***/ "./Resources/assets/sass/app.scss":
/*!****************************************!*\
  !*** ./Resources/assets/sass/app.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************!*\
  !*** multi ./Resources/assets/js/app.js ./Resources/assets/sass/app.scss ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /var/www/html/shopping/Modules/Product/Resources/assets/js/app.js */"./Resources/assets/js/app.js");
module.exports = __webpack_require__(/*! /var/www/html/shopping/Modules/Product/Resources/assets/sass/app.scss */"./Resources/assets/sass/app.scss");


/***/ })

/******/ });