jQuery(document).ready(function($) {
	"use strict";
    
    var GMO_WIDGET = {
        
        init : function () {
            this.searchInput();
            this.chosseItem();
            this.removeItem();
        },

        searchInput:function() {
            $('#wpwrap').on('keyup', '#bas-widget-search-input', function(e) {
                let argsItem = new Array(),
                textInput    = $(e.currentTarget).val(),
                itemWrap     = $(e.currentTarget).closest(".bas-widget-field"),
                list         = $.parseJSON(itemWrap.find(".bas-widget-data-args").val());
                itemWrap.find(".bas-widget-list").empty();

                list.map((val, key) => {
                    let n = val.label.toLowerCase().search( textInput.toLowerCase() );
                    if (n > -1 ) {
                        argsItem.push(val);
                    }
                });
        
                // show list
                if (argsItem.length > 0) {
                    itemWrap.find(".bas-widget-list").show();
                    let output = '';
                    argsItem.map((val, key) => {
                        output += `<li class="bas-widget-item" data-value="${val.value}"><a>${val.label}</a></li>`;
                    });
                    itemWrap.find(".bas-widget-list").append(output);
                } else {
                    itemWrap.find(".bas-widget-list").hide();
                }
            });
            
        },
        
        chosseItem:function() {
            $('#wpwrap').on('click', '.bas-widget-item', function(e) {
                let itemWrap = $(e.currentTarget).closest(".bas-widget-field"),
                itemVal      = $(e.currentTarget).data("value"),
                itemName     = $(e.currentTarget).find('a').html(),
                value        = itemWrap.find(".bas-widget-value").val(),
                status       = true;

                //check item already exists
                if ('' != value) {
                    let argsVal  = value.split(",");
                    argsVal.map((val, key) => {
                        if (val == itemVal) {
                            status = false;
                        }
                    });
                }

                //handle add template item
                if (status) { 
                    itemWrap.find(".bas-widget-inline").append(`
                        <li class="bas-widget-data" data-id="${itemVal}">
                            <span class="bas-widget-label"><a>${itemName}</a></span>
                            <a class="bas-widget-item-remove">x</a>
                        </li>
                    `);
                    //handle add value item
                    if ('' == value) {
                        itemWrap.find(".bas-widget-value").val(itemVal);
                    } else {
                        itemWrap.find(".bas-widget-value").val(`${value},${itemVal}`);
                    }
                }
                
                itemWrap.find(".bas-widget-list").empty();
                itemWrap.find(".bas-widget-list").hide();
                itemWrap.find(".bas-widget-search-input").val("");
                itemWrap.find(".bas-widget-search-input").focus();
            })
        },

        removeItem: function() {
            $('#wpwrap').on('click', '.bas-widget-item-remove', function(e) {
                console.log(321321);
                let valItem = $(e.currentTarget).closest(".bas-widget-data").attr("data-id"),
                itemWrap    = $(e.currentTarget).closest(".bas-widget-field"),
                value       = itemWrap.find(".bas-widget-value").val(),
                argsVal     = value.split(",");
                argsVal.map((val, key) => {
                    if (val == valItem) {
                        argsVal.splice(key, 1);
                    }
                });
                $(e.currentTarget).closest('.bas-widget-data').remove();
                itemWrap.find(".bas-widget-value").val(argsVal.toString());
            })
            
        }

    }

    GMO_WIDGET.init();
});