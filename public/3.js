(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Home.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Home.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuejs_datetimepicker__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuejs-datetimepicker */ "./node_modules/vuejs-datetimepicker/src/datetime_picker.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

var CancelToken = axios.CancelToken;
var cancel;
/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    datetime: vuejs_datetimepicker__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      title: "Inbox",
      mails: {},
      search: '',
      from_date: '',
      to_date: ''
    };
  },
  methods: {
    getResults: function getResults() {
      var _this = this;

      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
      var api = '';

      if (this.search) {
        api = 'api/search?q=' + this.search + '&page=';
        axios.get(api + page).then(function (response) {
          _this.mails = response.data;
          console.log(response.data.path + " " + _this.$route.toPath);
        });
      } else {
        axios.get('api/inbox?page=' + page).then(function (response) {
          _this.mails = response.data;
          console.log(response.data.path + " " + _this.$route.toPath);
        });
      }
    },
    fetchData: function fetchData() {
      var _this2 = this;

      axios.get('/api/inbox').then(function (response) {
        _this2.mails = response.data;
      });
    },
    searchit: _.debounce(function () {
      var _this3 = this;

      var query = this.search;
      axios.get('/api/search?q=' + query).then(function (response) {
        _this3.mails = response.data;
        console.log(response.data);
      });
      console.log(query);
    }, 1200),
    date_search: function date_search() {
      var _this4 = this;

      axios.post('/api/date_search', {
        from_date: this.from_date,
        to_date: this.to_date
      }).then(function (response) {
        _this4.mails = response.data;
        console.log(response.data);
      });
      console.log(this.from_date + " " + this.to_date);
    }
  },
  mounted: function mounted() {
    this.fetchData();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Home.vue?vue&type=template&id=63cd6604&":
/*!**************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Home.vue?vue&type=template&id=63cd6604& ***!
  \**************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container" }, [
    _c(
      "button",
      {
        attrs: { type: "button", name: "button" },
        on: { click: _vm.fetchData }
      },
      [_vm._v("Refresh")]
    ),
    _vm._v(" "),
    _c("div", { staticClass: "row justify-content-center" }, [
      _c("div", { staticClass: "col-md-8" }, [
        _c("form", { staticClass: "form-inline my-2 my-lg-0" }, [
          _c("input", {
            directives: [
              {
                name: "model",
                rawName: "v-model",
                value: _vm.search,
                expression: "search"
              }
            ],
            staticClass: "form-control mr-sm-2",
            attrs: {
              type: "search",
              placeholder: "Search",
              "aria-label": "Search"
            },
            domProps: { value: _vm.search },
            on: {
              keyup: _vm.searchit,
              input: function($event) {
                if ($event.target.composing) {
                  return
                }
                _vm.search = $event.target.value
              }
            }
          }),
          _vm._v(" "),
          _c(
            "button",
            {
              staticClass: "form-control btn btn-outline-success",
              on: {
                click: function($event) {
                  $event.preventDefault()
                  return _vm.searchit($event)
                }
              }
            },
            [_vm._v("Search")]
          )
        ]),
        _vm._v(" "),
        _c("br"),
        _vm._v(" "),
        _c("br"),
        _vm._v(" "),
        _c("div", { staticClass: "card card-default" }, [
          _c("div", { staticClass: "card-header" }, [
            _vm._v(_vm._s(_vm.title))
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c(
              "div",
              { staticStyle: { float: "left" } },
              [
                _c("datetime", {
                  attrs: { format: "YYYY/MM/DD", width: "300px" },
                  model: {
                    value: _vm.from_date,
                    callback: function($$v) {
                      _vm.from_date = $$v
                    },
                    expression: "from_date"
                  }
                }),
                _vm._v(
                  "\n                    " +
                    _vm._s(_vm.from_date) +
                    "\n                  "
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticStyle: { float: "right" } },
              [
                _c("datetime", {
                  attrs: { format: "YYYY/MM/DD", width: "300px" },
                  model: {
                    value: _vm.to_date,
                    callback: function($$v) {
                      _vm.to_date = $$v
                    },
                    expression: "to_date"
                  }
                }),
                _vm._v(
                  "\n                    " +
                    _vm._s(_vm.to_date) +
                    "\n                  "
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "button",
              {
                staticClass: "form-control btn btn-outline-success",
                on: { click: _vm.date_search }
              },
              [_vm._v("Search")]
            ),
            _vm._v(" "),
            _c("table", { staticClass: "table" }, [
              _vm._m(0),
              _vm._v(" "),
              _c(
                "tbody",
                _vm._l(_vm.mails.data, function(mail, index) {
                  return _c("tr", [
                    _c("td", [_vm._v(_vm._s(mail.to_email))]),
                    _vm._v(" "),
                    _c(
                      "td",
                      [
                        _c(
                          "router-link",
                          { staticClass: "nav-link", attrs: { to: "/about" } },
                          [
                            _vm._v(
                              "\n                              " +
                                _vm._s(mail.user.email) +
                                "\n                            "
                            )
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(mail.body))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(mail.user_id))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(mail.is_read ? "" : "Unread"))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(mail.send_date))])
                  ])
                })
              )
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "card-footer" },
            [
              _c("pagination", {
                attrs: { data: _vm.mails, "show-disabled": true, limit: 1 },
                on: { "pagination-change-page": _vm.getResults }
              })
            ],
            1
          )
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("To")]),
        _vm._v(" "),
        _c("th", [_vm._v("From")]),
        _vm._v(" "),
        _c("th", [_vm._v("Body")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/Home.vue":
/*!*************************************!*\
  !*** ./resources/js/views/Home.vue ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Home_vue_vue_type_template_id_63cd6604___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Home.vue?vue&type=template&id=63cd6604& */ "./resources/js/views/Home.vue?vue&type=template&id=63cd6604&");
/* harmony import */ var _Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Home.vue?vue&type=script&lang=js& */ "./resources/js/views/Home.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Home_vue_vue_type_template_id_63cd6604___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Home_vue_vue_type_template_id_63cd6604___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Home.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Home.vue?vue&type=script&lang=js&":
/*!**************************************************************!*\
  !*** ./resources/js/views/Home.vue?vue&type=script&lang=js& ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Home.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Home.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Home.vue?vue&type=template&id=63cd6604&":
/*!********************************************************************!*\
  !*** ./resources/js/views/Home.vue?vue&type=template&id=63cd6604& ***!
  \********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_63cd6604___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Home.vue?vue&type=template&id=63cd6604& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Home.vue?vue&type=template&id=63cd6604&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_63cd6604___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_63cd6604___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);