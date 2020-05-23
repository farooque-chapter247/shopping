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

/***/ "./Resources/assets/js/checkout.js":
/*!*****************************************!*\
  !*** ./Resources/assets/js/checkout.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  /* Set rates + misc */
  var fadeTime = 300;
  $('.pay-amount').html('$' + $('#cart-total').html());
  /* Assign actions */

  $('.product-quantity input').change(function () {
    updateQuantity(this);
  });
  $('.product-removal button').click(function () {
    var _this = this;

    Swal.fire({
      title: 'Are you sure?',
      text: "You want to delete it.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then(function (result) {
      if (result.value) {
        removeItem(_this);
      }
    });
  });
  /* Recalculate cart */

  function recalculateCart() {
    var subtotal = 0;
    /* Sum up row totals */

    $('.product').each(function () {
      subtotal += parseFloat($(this).children('.product-line-price').text());
    });
    /* Calculate totals */

    var total = subtotal;
    /* Update totals display */

    $('.totals-value').fadeOut(fadeTime, function () {
      $('#cart-subtotal').html(subtotal.toFixed(2));
      $('.pay-amount').html('$' + total.toFixed(2));
      $('#cart-total').html(total.toFixed(2));

      if (total == 0) {
        $('#product-table').css('display', 'none');
        $('.no-product').removeClass('invisible');
        $('.checkout').fadeOut(fadeTime);
      } else {
        $('.pay-amount').html('$' + total.toFixed(2));
        $('.shopping-cart').show();
        $('.no-product').addClass('invisible');
        $('.checkout').fadeIn(fadeTime);
      }

      $('.totals-value').fadeIn(fadeTime);
    });
  }
  /* Update quantity */


  function updateQuantity(quantityInput) {
    var rowid = $(quantityInput).attr('data-rowid');
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.product-price').text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;
    var request = $.ajax({
      url: route('cart.update'),
      type: "get",
      data: {
        rowid: rowid,
        qty: quantity
      }
    });
    request.done(function (res) {
      /* Update line price display and recalc cart totals */
      productRow.children('.product-line-price').each(function () {
        $(this).fadeOut(fadeTime, function () {
          $(this).text(linePrice.toFixed(2));
          recalculateCart();
          $(this).fadeIn(fadeTime);
        });
      });
    });
    request.fail(function (jqXHR, textStatus) {});
    /* Calculate line price */
  }
  /* Remove item from cart */


  function removeItem(removeButton) {
    /* Remove row from DOM and recalc cart total */
    var rowid = $(removeButton).attr('data-rowid');
    var request = $.ajax({
      url: route('cart.remove'),
      type: "get",
      data: {
        rowid: rowid
      }
    });
    request.done(function (res) {
      console.log(res);
      var productRow = $(removeButton).parent().parent();
      productRow.slideUp(fadeTime, function () {
        productRow.remove();
        recalculateCart();
      });
    });
    request.fail(function (jqXHR, textStatus) {});
  }

  $('.minus').click(function () {
    var $input = $(this).parent().find('.quantity');
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
  });
  $('.plus').click(function () {
    var $input = $(this).parent().find('.quantity');
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });
  $("#submitForm").submit(function (e) {
    e.preventDefault();
    formData = new FormData($(this)[0]);
    $.ajax({
      type: 'post',
      url: route('ds'),
      dataType: 'json',
      data: formData,
      success: function success(data) {
        alert(data.message);
      }
    });
  });
});

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./Resources/assets/js/checkout.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/shopping/Modules/Cart/Resources/assets/js/checkout.js */"./Resources/assets/js/checkout.js");


/***/ })

/******/ });