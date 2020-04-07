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

/***/ "./resources/js/layering.js":
/*!**********************************!*\
  !*** ./resources/js/layering.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /home/grace/IdentityMapping/resources/js/layering.js: Unexpected token, expected \",\" (60:43)\n\n\u001b[0m \u001b[90m 58 | \u001b[39m      fillColor\u001b[33m:\u001b[39m  \u001b[32m'red'\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 59 | \u001b[39m      content\u001b[33m:\u001b[39m  \u001b[32m\"Circle \"\u001b[39m \u001b[33m+\u001b[39m i\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 60 | \u001b[39m      position\u001b[33m:\u001b[39m c\u001b[33m.\u001b[39mgetItem({data\u001b[33m:\u001b[39m {center}})\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m                                           \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 61 | \u001b[39m      insert\u001b[33m:\u001b[39m \u001b[36mfalse\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 62 | \u001b[39m      visible\u001b[33m:\u001b[39m \u001b[36mfalse\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 63 | \u001b[39m      data\u001b[33m:\u001b[39m {\u001b[0m\n    at Parser.raise (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:6930:17)\n    at Parser.unexpected (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:8323:16)\n    at Parser.expect (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:8309:28)\n    at Parser.parseObj (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9894:14)\n    at Parser.parseExprAtom (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9525:28)\n    at Parser.parseExprSubscripts (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9165:23)\n    at Parser.parseMaybeUnary (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9145:21)\n    at Parser.parseExprOps (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9011:23)\n    at Parser.parseMaybeConditional (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:8984:23)\n    at Parser.parseMaybeAssign (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:8930:21)\n    at Parser.parseExprListItem (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10252:18)\n    at Parser.parseExprList (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10226:22)\n    at Parser.parseNewArguments (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9837:25)\n    at Parser.parseNew (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9831:10)\n    at Parser.parseExprAtom (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9542:21)\n    at Parser.parseExprSubscripts (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9165:23)\n    at Parser.parseMaybeUnary (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9145:21)\n    at Parser.parseExprOps (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:9011:23)\n    at Parser.parseMaybeConditional (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:8984:23)\n    at Parser.parseMaybeAssign (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:8930:21)\n    at Parser.parseVar (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:11262:26)\n    at Parser.parseVarStatement (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:11081:10)\n    at Parser.parseStatementContent (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10678:21)\n    at Parser.parseStatement (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10611:17)\n    at Parser.parseBlockOrModuleBlockBody (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:11187:25)\n    at Parser.parseBlockBody (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:11174:10)\n    at Parser.parseBlock (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:11158:10)\n    at Parser.parseStatementContent (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10687:21)\n    at Parser.parseStatement (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10611:17)\n    at node.body.withTopicForbiddingContext (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:11221:60)\n    at Parser.withTopicForbiddingContext (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10486:14)\n    at Parser.parseFor (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:11221:22)\n    at Parser.parseForStatement (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10933:19)\n    at Parser.parseStatementContent (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10636:21)\n    at Parser.parseStatement (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:10611:17)\n    at Parser.parseBlockOrModuleBlockBody (/home/grace/IdentityMapping/node_modules/@babel/parser/lib/index.js:11187:25)");

/***/ }),

/***/ 1:
/*!****************************************!*\
  !*** multi ./resources/js/layering.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/grace/IdentityMapping/resources/js/layering.js */"./resources/js/layering.js");


/***/ })

/******/ });