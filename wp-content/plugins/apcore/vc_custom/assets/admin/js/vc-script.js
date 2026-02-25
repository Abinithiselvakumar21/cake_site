(function($) {
	// VC Apress Universe - theme predefined vc templates js
	vc.TemplateWindowUIPanelBackendEditor = vc.TemplatesPanelViewBackend.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperTemplatesPanelViewSearch).extend({
		panelName: "template_window",
		showMessageDisabled: !1,
		initialize: function() {
			vc.TemplateWindowUIPanelBackendEditor.__super__.initialize.call(this), this.trigger("show", this.initTemplatesTabs, this)
		},
		show: function() {

			this.clearSearch(), vc.TemplateWindowUIPanelBackendEditor.__super__.show.call(this), $('.vc_edit-form-tab[data-tab="apress_templates"] .sortable_templates ul > li').each(function() {
				"all" == $(this).attr("data-sort") ? $(this).find(".count").html($('.vc_edit-form-tab[data-tab="apress_templates"] .vc_ui-template-list > .vc_ui-template').length) : $(this).find(".count").html($('.vc_edit-form-tab[data-tab="apress_templates"] .vc_ui-template-list > .vc_ui-template.' + $(this).attr("data-sort")).length)
			}), $('.vc_edit-form-tab[data-tab="apress_templates"] .sortable_templates li[data-sort="all"]').addClass("active").trigger("click"), $('.vc_edit-form-tab[data-tab="apress_templates"] .sortable_templates li').click(function() {
				$('.vc_edit-form-tab[data-tab="apress_templates"] .sortable_templates li').removeClass("active"), $(this).addClass("active");
				var t = $(this).attr("data-sort");
				$('.vc_edit-form-tab[data-tab="apress_templates"] .vc_ui-template-list > .vc_ui-template').removeClass("hidden"), "all" != t && $('.vc_edit-form-tab[data-tab="apress_templates"] .vc_ui-template-list > .vc_ui-template:not(.' + t + ")").addClass("hidden")
			}),
			$('.vc_ui-template', $(this.el) ).removeClass('is-loading').find('.vc-composer-icon').removeClass('vc-c-icon-sync').addClass('vc-c-icon-add');
			$('.vc_ui-control-button i', $(this.el) ).removeClass('rotating');
			$(this.el).on('click', '.vc_ui-template [data-template-handler]' ,function() {

				$(this).closest('.vc_ui-template').addClass('is-loading')
				if ( $(this).is('.vc_ui-control-button') ) {
					$(this).find('.vc-composer-icon').removeClass('vc-c-icon-add').addClass('vc-c-icon-sync rotating');
				} else {
					$(this).next('.vc_ui-list-bar-item-actions').find('.vc-composer-icon').removeClass('vc-c-icon-add').addClass('vc-c-icon-sync rotating');
				}

			})
		},
		initTemplatesTabs: function() {

			this.$el.find('[data-vc-ui-element="panel-tabs-controls"]').vcTabsLine("moveTabs")

		},
		showMessage: function(text, type) {

			var wrapperCssClasses;
			if (this.showMessageDisabled) return !1;
			wrapperCssClasses = "vc_col-xs-12 wpb_element_wrapper", this.message_box_timeout && this.$el.find("[data-vc-panel-message]").remove() && window.clearTimeout(this.message_box_timeout), this.message_box_timeout = !1;
			var $messageBox, messageBoxTemplate = vc.template('<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-<%- color %>"><div class="vc_message_box-icon"><i class="fa fa fa-<%- icon %>"></i></div><p><%- text %></p></div>');
			switch (type) {
				case "error":
				$messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
					color: "danger",
					icon: "times",
					text: text
				}));
				break;
				case "warning":
				$messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
					color: "warning",
					icon: "exclamation-triangle",
					text: text
				}));
				break;
				case "success":
				$messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
					color: "success",
					icon: "check",
					text: text
				}))
			}
			$messageBox.prependTo(this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_row.vc_active')), $messageBox.fadeIn(), this.message_box_timeout = window.setTimeout(function() {
				$messageBox.remove()
			}, 6e3)
		},
		changeTab: function(e) {
			e.preventDefault(), e && !e.isClearSearch && this.clearSearch();

			var $tab = $(e.currentTarget);
			$tab.parent().hasClass("vc_active") || (this.$el.find('[data-vc-ui-element="panel-tabs-controls"] .vc_active:not([data-vc-ui-element="panel-tabs-line-dropdown"])').removeClass("vc_active"), $tab.parent().addClass("vc_active"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_active').removeClass("vc_active"), this.$el.find($tab.data("vcUiElementTarget")).addClass("vc_active"), this.$tabsMenu && this.$tabsMenu.vcTabsLine("checkDropdownContainerActive"))
		},
		setPreviewFrameHeight: function(templateID, height) {
			parseInt(height) < 100 && (height = 100), $('data-vc-template-preview-frame="' + templateID + '"').height(height)
		}
	}), vc.TemplateWindowUIPanelBackendEditor.prototype.events = $.extend(!0, vc.TemplateWindowUIPanelBackendEditor.prototype.events, {
		'click [data-vc-ui-element="button-save"]': "save",
		'click [data-vc-ui-element="button-close"]': "hide",
		'click [data-vc-ui-element="button-minimize"]': "toggleOpacity",
		"keyup [data-vc-templates-name-filter]": "searchTemplate",
		"search [data-vc-templates-name-filter]": "searchTemplate",
		"click .vc_template-save-btn": "saveTemplate",
		"click [data-template_id] [data-template-handler]": "loadTemplate",
		'click [data-vc-container=".vc_ui-list-bar"][data-vc-preview-handler]': "buildTemplatePreview",
		'click [data-vc-ui-delete="template-title"]': "removeTemplate",
		'click [data-vc-ui-element="panel-tab-control"]': "changeTab"
	}), vc.TemplateWindowUIPanelFrontendEditor = vc.TemplatesPanelViewFrontend.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperTemplatesPanelViewSearch).extend({
		panelName: "template_window",
		showMessageDisabled: !1,
		show: function() {
			this.clearSearch(), vc.TemplateWindowUIPanelFrontendEditor.__super__.show.call(this), $('.vc_edit-form-tab[data-tab="apress_templates"] .sortable_templates ul > li').each(function() {
				"all" == $(this).attr("data-sort") ? $(this).find(".count").html($('.vc_edit-form-tab[data-tab="apress_templates"] .vc_ui-template-list > .vc_ui-template').length) : $(this).find(".count").html($('.vc_edit-form-tab[data-tab="apress_templates"] .vc_ui-template-list > .vc_ui-template.' + $(this).attr("data-sort")).length)
			}), $('.vc_edit-form-tab[data-tab="apress_templates"] .sortable_templates li[data-sort="all"]').addClass("active").trigger("click"), $('.vc_edit-form-tab[data-tab="apress_templates"] .sortable_templates li').click(function() {
				$('.vc_edit-form-tab[data-tab="apress_templates"] .sortable_templates li').removeClass("active"), $(this).addClass("active");
				var t = $(this).attr("data-sort");
				$('.vc_edit-form-tab[data-tab="apress_templates"] .vc_ui-template-list > .vc_ui-template').removeClass("hidden"), "all" != t && $('.vc_edit-form-tab[data-tab="apress_templates"] .vc_ui-template-list > .vc_ui-template:not(.' + t + ")").addClass("hidden")
			}),
			$('.vc_ui-template', $(this.el) ).removeClass('is-loading').find('.vc-composer-icon').removeClass('vc-c-icon-sync').addClass('vc-c-icon-add');
			$('.vc_ui-control-button i', $(this.el) ).removeClass('rotating');
			$(this.el).on('click', '.vc_ui-template [data-template-handler]' ,function() {

				$(this).closest('.vc_ui-template').addClass('is-loading')
				if ( $(this).is('.vc_ui-control-button') ) {
					$(this).find('.vc-composer-icon').removeClass('vc-c-icon-add').addClass('vc-c-icon-sync rotating');
				} else {
					$(this).next('.vc_ui-list-bar-item-actions').find('.vc-composer-icon').removeClass('vc-c-icon-add').addClass('vc-c-icon-sync rotating');
				}

			})
		},
		showMessage: function(text, type) {
			if (this.showMessageDisabled) return !1;
			this.message_box_timeout && this.$el.find("[data-vc-panel-message]").remove() && window.clearTimeout(this.message_box_timeout), this.message_box_timeout = !1;
			var $messageBox, wrapperCssClasses, messageBoxTemplate = vc.template('<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-<%- color %>"><div class="vc_message_box-icon"><i class="fa fa fa-<%- icon %>"></i></div><p><%- text %></p></div>');
			switch (wrapperCssClasses = "vc_col-xs-12 wpb_element_wrapper", type) {
				case "error":
				$messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
					color: "danger",
					icon: "times",
					text: text
				}));
				break;
				case "warning":
				$messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
					color: "warning",
					icon: "exclamation-triangle",
					text: text
				}));
				break;
				case "success":
				$messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
					color: "success",
					icon: "check",
					text: text
				}))
			}
			$messageBox.prependTo(this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_row.vc_active')), $messageBox.fadeIn(), this.message_box_timeout = window.setTimeout(function() {
				$messageBox.remove()
			}, 6e3)
		},
		changeTab: function(e) {
			e.preventDefault(), e && !e.isClearSearch && this.clearSearch();
			var $tab = $(e.currentTarget);
			$tab.parent().hasClass("vc_active") || (this.$el.find('[data-vc-ui-element="panel-tabs-controls"] .vc_active:not([data-vc-ui-element="panel-tabs-line-dropdown"])').removeClass("vc_active"), $tab.parent().addClass("vc_active"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_active').removeClass("vc_active"), this.$el.find($tab.data("vcUiElementTarget")).addClass("vc_active"), this.$tabsMenu && this.$tabsMenu.vcTabsLine("checkDropdownContainerActive"))
		}
	}), $.fn.vcAccordion.Constructor.prototype.collapseTemplate = function(showCallback) {
		var $allTriggers, $activeTriggers, $this, $triggers;
		$this = this.$element;
		var i;
		if (i = 0, $allTriggers = this.getContainer().find("[data-vc-preview-handler]").each(function() {
			var accordion, $this;
			$this = $(this), accordion = $this.data("vc.accordion"), void 0 === accordion && ($this.vcAccordion(), accordion = $this.data("vc.accordion")), accordion && accordion.setIndex && accordion.setIndex(i++)
		}), $activeTriggers = $allTriggers.filter(function() {
			var $this, accordion;
			return $this = $(this), accordion = $this.data("vc.accordion"), accordion.getTarget().hasClass(accordion.activeClass)
		}), $triggers = $activeTriggers.filter(function() {
			return $this[0] !== this
		}), $triggers.length && $.fn.vcAccordion.call($triggers, "hide"), this.isActive()) $.fn.vcAccordion.call($this, "hide");
		else {
			$.fn.vcAccordion.call($this, "show");
			var $triggerPanel = $this.closest(".vc_ui-list-bar-item"),
			$wrapper = $this.closest("[data-template_id]"),
			$panel = $wrapper.closest("[data-vc-ui-element=panel-content]").parent();
			setTimeout(function() {
				if (Math.round($wrapper.offset().top - $panel.offset().top) < 0) {
					var posit = Math.round($wrapper.offset().top - $panel.offset().top + $panel.scrollTop() - $triggerPanel.height());
					$panel.animate({
						scrollTop: posit
					}, 400)
				}
				"function" == typeof showCallback && showCallback($wrapper, $panel)
			}, 400)
		}
	}
// Responsive css	
vc.atts.responsive_css_editor = {
        parse: function(e) {
            var a = this.content().find(".wpb_vc_param_value[name=" + e.param_name + "]"),
                t = a.parent(),
                i = {},
                n, l;
            return resolutions = ["small", "medium", "smartphones"], props = ["margin", "padding", "border"], i.margin_top_smartphones = t.find('[data-name="margin-top-smartphones"]').val(), i.margin_right_smartphones = t.find('[data-name="margin-right-smartphones"]').val(), i.margin_bottom_smartphones = t.find('[data-name="margin-bottom-smartphones"]').val(), i.margin_left_smartphones = t.find('[data-name="margin-left-smartphones"]').val(), i.border_top_smartphones = t.find('[data-name="border-top-smartphones"]').val(), i.border_right_smartphones = t.find('[data-name="border-right-smartphones"]').val(), i.border_bottom_smartphones = t.find('[data-name="border-bottom-smartphones"]').val(), i.border_left_smartphones = t.find('[data-name="border-left-smartphones"]').val(), i.padding_top_smartphones = t.find('[data-name="padding-top-smartphones"]').val(), i.padding_right_smartphones = t.find('[data-name="padding-right-smartphones"]').val(), i.padding_bottom_smartphones = t.find('[data-name="padding-bottom-smartphones"]').val(), i.padding_left_smartphones = t.find('[data-name="padding-left-smartphones"]').val(), i.margin_top_medium = t.find('[data-name="margin-top-medium"]').val(), i.margin_right_medium = t.find('[data-name="margin-right-medium"]').val(), i.margin_bottom_medium = t.find('[data-name="margin-bottom-medium"]').val(), i.margin_left_medium = t.find('[data-name="margin-left-medium"]').val(), i.border_top_medium = t.find('[data-name="border-top-medium"]').val(), i.border_right_medium = t.find('[data-name="border-right-medium"]').val(), i.border_bottom_medium = t.find('[data-name="border-bottom-medium"]').val(), i.border_left_medium = t.find('[data-name="border-left-medium"]').val(), i.padding_top_medium = t.find('[data-name="padding-top-medium"]').val(), i.padding_right_medium = t.find('[data-name="padding-right-medium"]').val(), i.padding_bottom_medium = t.find('[data-name="padding-bottom-medium"]').val(), i.padding_left_medium = t.find('[data-name="padding-left-medium"]').val(), i.margin_top_small = t.find('[data-name="margin-top-small"]').val(), i.margin_right_small = t.find('[data-name="margin-right-small"]').val(), i.margin_bottom_small = t.find('[data-name="margin-bottom-small"]').val(), i.margin_left_small = t.find('[data-name="margin-left-small"]').val(), i.border_top_small = t.find('[data-name="border-top-small"]').val(), i.border_right_small = t.find('[data-name="border-right-small"]').val(), i.border_bottom_small = t.find('[data-name="border-bottom-small"]').val(), i.border_left_small = t.find('[data-name="border-left-small"]').val(), i.padding_top_small = t.find('[data-name="padding-top-small"]').val(), i.padding_right_small = t.find('[data-name="padding-right-small"]').val(), i.padding_bottom_small = t.find('[data-name="padding-bottom-small"]').val(), i.padding_left_small = t.find('[data-name="padding-left-small"]').val(), n = _.map(i, function(e, a) {
                if (_.isString(e) && 0 < e.length) return e.match(/^-?\d*(\.\d+){0,1}(%|in|cm|mm|em|rem|ex|pt|pc|px|vw|vh|vmin|vmax)$/) || (e = isNaN(parseFloat(e)) ? "" : parseFloat(e) + "px"), e.length, a + ":" + encodeURIComponent(e)
            }), l = $.grep(n, function(e) {
                return _.isString(e) && 0 < e.length
            }).join("|")
        },
        init: function(e, a) {
            var t = a.next(".vc_wrapper-param-type-css_editor").find(".vc_layout-onion"),
                i = t.wrapInner('<div class="vc-onion-wrap active" />'),
                n = $('<h3 class="apcore-responsive-css-heading large"><i class="vc-composer-icon vc-c-icon-layout_default"></i></h3>');
            a.find(".edit_form_line").clone(!0).prependTo(i), n.prependTo(t.find(".vc-onion-wrap")), a.hide(), t.find(".apcore-main-responsive-wrapper.active").removeClass("active");
            var l = a.find(".apcore-responsive-css-container").find("input"),
                s = t.find(".apcore-responsive-css-container").find("input");
            s.on("change", function() {
                var e = $(this),
                    a = s.index($(this));
                l.eq(a).val(e.val()).trigger("change")
            }), $("h3.apcore-responsive-css-heading", t).on("click", function() {
                var e = $(this);
                e.closest(".vc_layout-onion").find(".vc-onion-wrap.active, .apcore-main-responsive-wrapper.active").removeClass("active"), e.parent().addClass("active")
            })
        }
    }
})(jQuery);
