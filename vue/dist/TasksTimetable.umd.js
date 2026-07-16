(function(global, factory) {
  typeof exports === "object" && typeof module !== "undefined" ? factory(exports, require("vue"), require("CoreHome")) : typeof define === "function" && define.amd ? define(["exports", "vue", "CoreHome"], factory) : (global = typeof globalThis !== "undefined" ? globalThis : global || self, factory(global.TasksTimetable = {}, global.Vue, global.CoreHome));
})(this, (function(exports2, vue, CoreHome) {
  "use strict";
  const _sfc_main = vue.defineComponent({
    props: {
      currentTime: {
        type: String,
        required: true
      },
      tasks: {
        type: Array,
        required: true
      }
    },
    components: {
      ContentBlock: CoreHome.ContentBlock
    },
    directives: {
      ContentTable: CoreHome.ContentTable
    },
    computed: {
      introduction() {
        return CoreHome.translate(
          "TasksTimetable_Introduction",
          `<span class="server-time">${this.currentTime}</span>`
        );
      }
    }
  });
  const _export_sfc = (sfc, props) => {
    const target = sfc.__vccOpts || sfc;
    for (const [key, val] of props) {
      target[key] = val;
    }
    return target;
  };
  const _hoisted_1 = ["innerHTML"];
  const _hoisted_2 = { style: { "color": "#999" } };
  const _hoisted_3 = ["innerHTML"];
  const _hoisted_4 = { key: 0 };
  const _hoisted_5 = { colspan: "2" };
  function _sfc_render(_ctx, _cache, $props, $setup, $data, $options) {
    const _component_ContentBlock = vue.resolveComponent("ContentBlock");
    const _directive_content_table = vue.resolveDirective("content-table");
    return vue.openBlock(), vue.createBlock(_component_ContentBlock, {
      "content-title": _ctx.translate("TasksTimetable_ScheduledTasks")
    }, {
      default: vue.withCtx(() => [
        vue.createElementVNode("p", {
          innerHTML: _ctx.$sanitize(_ctx.introduction)
        }, null, 8, _hoisted_1),
        vue.withDirectives((vue.openBlock(), vue.createElementBlock("table", null, [
          vue.createElementVNode("thead", null, [
            vue.createElementVNode("tr", null, [
              vue.createElementVNode("th", null, vue.toDisplayString(_ctx.translate("General_Name")), 1),
              vue.createElementVNode("th", null, vue.toDisplayString(_ctx.translate("General_Date")) + " in UTC timezone", 1)
            ])
          ]),
          vue.createElementVNode("tbody", null, [
            (vue.openBlock(true), vue.createElementBlock(vue.Fragment, null, vue.renderList(_ctx.tasks, (task, index) => {
              return vue.openBlock(), vue.createElementBlock("tr", { key: index }, [
                vue.createElementVNode("td", null, vue.toDisplayString(task.name), 1),
                vue.createElementVNode("td", null, [
                  vue.createTextVNode(vue.toDisplayString(task.executionDate), 1),
                  _cache[2] || (_cache[2] = vue.createElementVNode("br", null, null, -1)),
                  vue.createElementVNode("span", _hoisted_2, [
                    _cache[0] || (_cache[0] = vue.createTextVNode(" (in ", -1)),
                    vue.createElementVNode("span", {
                      innerHTML: _ctx.$sanitize(task.ts_difference || "")
                    }, null, 8, _hoisted_3),
                    _cache[1] || (_cache[1] = vue.createTextVNode(") ", -1))
                  ])
                ])
              ]);
            }), 128)),
            !_ctx.tasks.length ? (vue.openBlock(), vue.createElementBlock("tr", _hoisted_4, [
              vue.createElementVNode("td", _hoisted_5, [
                _cache[3] || (_cache[3] = vue.createElementVNode("br", null, null, -1)),
                vue.createTextVNode(vue.toDisplayString(_ctx.translate("TasksTimetable_NothingScheduled")), 1),
                _cache[4] || (_cache[4] = vue.createElementVNode("br", null, null, -1)),
                _cache[5] || (_cache[5] = vue.createElementVNode("br", null, null, -1))
              ])
            ])) : vue.createCommentVNode("", true)
          ])
        ])), [
          [_directive_content_table]
        ])
      ]),
      _: 1
    }, 8, ["content-title"]);
  }
  const TasksTable = /* @__PURE__ */ _export_sfc(_sfc_main, [["render", _sfc_render]]);
  exports2.TasksTable = TasksTable;
  Object.defineProperty(exports2, Symbol.toStringTag, { value: "Module" });
}));
