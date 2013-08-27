/**
 * @version     $Id$
 * @package     JSNTPLFW
 * @author      JoomlaShine Team <support@joomlashine.com>
 * @copyright   Copyright (C) 2012 JoomlaShine.com. All Rights Reserved.
 * @license     GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.joomlashine.com
 * Technical Support:  Feedback - http://www.joomlashine.com/contact-us/get-support.html
 */
define([
    'jquery',
    'jquery.json',
    'jquery.ui'],
    function ($) {
        function JSNLayoutCustomizer() {

        }

        JSNLayoutCustomizer.prototype = {
            init:function (_this) {

                // Get necessary elements
                this.container = $(_this);
                this.columns = this.container.children('.jsn-column-container');

                // Reset width for necessary elements
                this.columns.children().css('width', '');
                this.container.css('width', '');

                // Initialize variables
                this.maxWidth = 720;
                this.spacing = 12;
                // this.spacing = parseInt(this.columns.css('margin-left')) + parseInt(this.columns.css('margin-right'));

                //   this.maxHeight = this.container.height();
                this.container.find(".last-child").removeClass("last-child");
                var formRowLength = this.columns.length;
                this.step = parseInt(this.maxWidth / 12);
                if (formRowLength == 2) {
                    this.step = parseInt(parseInt(this.maxWidth - parseInt(this.spacing)) / 12);
                } else if (formRowLength == 3) {
                    this.step = parseInt(parseInt(this.maxWidth - parseInt(this.spacing * 2)) / 12);
                }
                // Calculate width for resizable columns
                var total = 0;
                this.columns.children().each($.proxy(function (i, e) {
                        // Calculate column width
                        var span = parseInt($(e).attr('class').replace("ui-resizable", "").replace("jsn-column", "").replace('span', ''));
                        var width = (this.step * span);
                        $(e).css('width', width + 'px');
                        // Count total width
                        total += $(e).parent().outerWidth(true);
                    }
                    ,
                    this
                ))
                ;
                // Update width for container
                this.container.css('width', this.maxWidth + 'px');
                this.columns.each($.proxy(function (i, e) {
                    if (i + 1 == this.columns.length) {
                        $(e).addClass("last-child");
                    } else {
                        $(e).removeClass("last-child");
                    }
                }, this));

                // Initialize sortable
                this.container.sortable({
                    axis:'x',
                    //   placeholder:'ui-state-highlight',
                    start:$.proxy(function (event, ui) {
                        ui.placeholder.append(ui.item.children().clone());
                    }, this),
                    handle:".jsn-handle-drag",
                    stop:$.proxy(function (event, ui) {
                        // Refresh columns ordering
                        this.columns = this.container.children('.jsn-column-container');

                        // Re-initialize resizable
                        this.init($(_this));
                        this.columns.each($.proxy(function (i, e) {
                            if (i + 1 == this.columns.length) {
                                $(e).addClass("last-child");
                            }
                        }, this));
                    }, this)
                });
                this.container.disableSelection();
                // Initialize resizable
                this.initResizable();
            },

            initResizable:function () {
                var handleResize = $.proxy(function (event, ui) {
                    var span = parseInt((ui.element.width() ) / this.step),
                        thisWidth = (this.step * span),
                        nextWidth = ui.element[0].__next[0].originalWidth - (thisWidth - ui.originalSize.width);

                    if (thisWidth < this.step) {
                        thisWidth = this.step;
                        nextWidth = ui.element[0].__next[0].originalWidth - (thisWidth - ui.originalSize.width);

                        // Set min width to prevent column from collapse more
                        ui.element.resizable('option', 'minWidth', this.step);
                    } else if (nextWidth < this.step) {

                        nextWidth = this.step;
                        thisWidth = ui.originalSize.width - (nextWidth - ui.element[0].__next[0].originalWidth);

                        // Set max width to prevent column from expand more
                        ui.element.resizable('option', 'maxWidth', thisWidth);
                    }
                    // Snap column to grid
                    ui.element.css('width', thisWidth + 'px');

                    // Resize next sibling element as well
                    ui.element[0].__next.css('width', nextWidth + 'px');

                }, this);

                this.columns.children().each($.proxy(function (i, e) {
                    // Initialize resizable column
                    !$(e).hasClass('ui-resizable') || $(e).resizable('destroy');
                    !e.__next || (e.__next = null);
                    if (i + 1 < this.columns.length) {
                        // Reset resizable column

                        $(e).resizable({
                            handles:'e',
                            minWidth:this.step,
                            grid:[this.step, 0],
                            start:$.proxy(function (event, ui) {
                                ui.element[0].__next = ui.element[0].__next || ui.element.parent().next().children();
                                ui.element[0].__next[0].originalWidth = ui.element[0].__next.width();
                                ui.element.resizable('option', 'maxWidth', '');
                            }, this),
                            resize:handleResize,
                            stop:$.proxy(function (event, ui) {
                                //  handleResize(event, ui);
                                var oldValue = parseInt(ui.element.find(".jsn-column-content").attr("data-column-class").replace('span', '')),
                                    newValue = parseInt(ui.element.width() / this.step),
                                    nextOldValue = parseInt(ui.element[0].__next.find(".jsn-column-content").attr("data-column-class").replace('span', ''));
                                // Update field values
                                if (nextOldValue > 0 && newValue > 0) {
                                    ui.element.find(".jsn-column-content").attr("data-column-class", 'span' + newValue);
                                    ui.element[0].__next.find(".jsn-column-content").attr('data-column-class', 'span' + (nextOldValue - (newValue - oldValue)));
                                    // Update visual classes
                                    ui.element.attr('class', ui.element.attr('class').replace(/\bspan\d+\b/, 'span' + newValue));
                                    ui.element[0].__next.attr('class', ui.element[0].__next.attr('class').replace(/\bspan\d+\b/, 'span' + (nextOldValue - (newValue - oldValue))));
                                    $(e).css({"height":"auto"});
                                }

                            }, this)
                        });
                    }
                }, this));
            }
        };
        return JSNLayoutCustomizer;
    })
