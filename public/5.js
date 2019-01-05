(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[5],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Compose.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Compose.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      title: "Inbox",
      mail: {
        'email': '',
        'body': '',
        'attach_file': null
      },
      form: new FormData()
    };
  },
  methods: {
    select_file: function select_file(event) {
      console.log(event);
      this.mail.attach_file = event.target.files[0];
    },
    send: function send() {
      var _this = this;

      this.form.append('email', this.mail.email);
      this.form.append('body', this.mail.body);

      if (this.mail.attach_file) {
        this.form.append('attach_file', this.mail.attach_file);
      }

      var config = {
        headers: {
          'Content-Type': 'multipart/form-data'
        } // axios.post('/api/compose',this.form,config)
        //       .then((response) =>{
        //               console.log(response);
        //             })

      };
      this.$validator.validateAll().then(function (valid) {
        if (valid) {
          axios.post('/api/compose', _this.form, config).then(function (response) {
            console.log(response);

            _this.$router.push('/');
          });
        }
      }).catch(function () {
        alert(_this.errors.all());
      });
    },
    draft: function draft() {
      console.log('daft');
    }
  },
  mounted: function mounted() {// this.fetchData()
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Compose.vue?vue&type=template&id=2e4c267a&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Compose.vue?vue&type=template&id=2e4c267a& ***!
  \*****************************************************************************************************************************************************************************************************/
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
    _c("div", { staticClass: "row justify-content-center" }, [
      _c("div", { staticClass: "col-md-8" }, [
        _c("div", { staticClass: "card card-default" }, [
          _c("div", { staticClass: "card-header" }, [_vm._v("Compose")]),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c(
              "form",
              {
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.send($event)
                  }
                }
              },
              [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "email" } }, [
                    _vm._v("To Email address")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "validate",
                        rawName: "v-validate",
                        value: "required|email",
                        expression: "'required|email'"
                      },
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.mail.email,
                        expression: "mail.email"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "email",
                      name: "email",
                      id: "email",
                      "aria-describedby": "emailHelp",
                      placeholder: "Enter email"
                    },
                    domProps: { value: _vm.mail.email },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.mail, "email", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.errors.has("email") ? _c("br") : _vm._e(),
                  _vm._v(" "),
                  _vm.errors.has("email")
                    ? _c("span", { staticClass: "alert alert-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("email")))
                      ])
                    : _vm._e()
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "body" } }, [_vm._v("Body")]),
                  _vm._v(" "),
                  _c("textarea", {
                    directives: [
                      {
                        name: "validate",
                        rawName: "v-validate",
                        value: "required",
                        expression: "'required'"
                      },
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.mail.body,
                        expression: "mail.body"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      name: "body",
                      id: "body",
                      placeholder: "type something...."
                    },
                    domProps: { value: _vm.mail.body },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.mail, "body", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.errors.has("body") ? _c("br") : _vm._e(),
                  _vm._v(" "),
                  _vm.errors.has("body")
                    ? _c("span", { staticClass: "alert alert-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("body")))
                      ])
                    : _vm._e()
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "form-group" }, [
                  _c("input", {
                    attrs: { type: "file" },
                    on: { change: _vm.select_file }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "form-check" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-primary",
                      attrs: { type: "submit", name: "save" }
                    },
                    [_vm._v("Send")]
                  ),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-primary",
                      attrs: { name: "draft" },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.draft($event)
                        }
                      }
                    },
                    [_vm._v("Save as draft")]
                  )
                ])
              ]
            )
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/Compose.vue":
/*!****************************************!*\
  !*** ./resources/js/views/Compose.vue ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Compose_vue_vue_type_template_id_2e4c267a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Compose.vue?vue&type=template&id=2e4c267a& */ "./resources/js/views/Compose.vue?vue&type=template&id=2e4c267a&");
/* harmony import */ var _Compose_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Compose.vue?vue&type=script&lang=js& */ "./resources/js/views/Compose.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Compose_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Compose_vue_vue_type_template_id_2e4c267a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Compose_vue_vue_type_template_id_2e4c267a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Compose.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Compose.vue?vue&type=script&lang=js&":
/*!*****************************************************************!*\
  !*** ./resources/js/views/Compose.vue?vue&type=script&lang=js& ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Compose_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Compose.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Compose.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Compose_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Compose.vue?vue&type=template&id=2e4c267a&":
/*!***********************************************************************!*\
  !*** ./resources/js/views/Compose.vue?vue&type=template&id=2e4c267a& ***!
  \***********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Compose_vue_vue_type_template_id_2e4c267a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Compose.vue?vue&type=template&id=2e4c267a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Compose.vue?vue&type=template&id=2e4c267a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Compose_vue_vue_type_template_id_2e4c267a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Compose_vue_vue_type_template_id_2e4c267a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);