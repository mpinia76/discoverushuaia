jQuery(function($) {
    var $no_result = $('#ab_services_wrapper .no-result');
    // Remember user choice in the modal dialog.
    var update_staff_choice = null;

    // On new category form submit.
    $('#new-category-form').on('submit', function(event) {
        var data = $(this).serialize();
        $.post(ajaxurl, data, function(response) {
            $('.ab-category-item-list').append(response);
            $('#new_category_popup').ab_popup('close');
            // add created category to services
            $.each($('#services_list').find('select[name="category_id"]'), function(key, value) {
                var $new_category = $('.ab-category-item:last');
                $(value).append('<option value="' + $new_category.data('id') + '">'
                    + $new_category.find('input').val() + ' </option>');
            });
        });
        return false;
    });

    // Preventing multiple creation of new category by pressing Enter-key
    $('input[value="ab_category_form"]').parent().find('input:first').one('keypress', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            $(this).trigger(e).blur();
        }
    });

    // Categories list delegated events.
    $('#ab-categories-list')

        // On category item click.
        .on('click', '.ab-category-item', function() {
            var $clicked = $(this);
            $.get(ajaxurl, {action:'ab_category_services', category_id: $clicked.data('id')}, function(response) {
                $('.ab-category-item').not($clicked).removeClass('ab-active');
                $('.ab-category-title').text($clicked.text());
                $clicked.addClass('ab-active');
                refreshList(response,0);
            });
        })

        // On edit category click.
        .on('click', '.ab-category-item .ab-edit', function(e) {
            // Keep category item click from being executed.
            e.stopPropagation();
            // Prevent navigating to '#'.
            e.preventDefault();
            // Hide edit button.
            $(this).hide()
                // Hide displayed category name and delete button.
                .siblings('.displayed-value, .ab-delete').hide().end()
                // Show input field.
                .nextAll('.value').show().focus();
        })

        // On blur of category edit input.
        .on('blur', '.ab-category-item input.value', function() {
            var $this = $(this),
                $item = $this.closest('.ab-category-item'),
                field = $this.attr('name'),
                value = $this.attr('value'),
                id    = $item.data('id');
            if (value) {
                var data = { action: 'ab_update_category', id: id };
                data[field] = value;
                $.post(ajaxurl, data, function(response) {
                    // Hide input field.
                    $this.hide()
                        // Show modified category name.
                        .prevAll('.displayed-value').text(value).show().end()
                        // Show edit and delete buttons.
                        .siblings('.ab-edit, .ab-delete').show();
                    // update edited category's name for services
                    $.each($('#services_list').find('select[name="category_id"]'), function(k, v) {
                        $(v).find('option:selected[value="' + id + '"]').text(value);
                    });
                });
            }
        })

        // On delete category click.
        .on('click', '.ab-category-item .ab-delete', function(e) {
            // Keep category item click from being executed.
            e.stopPropagation();
            // Prevent navigating to '#'.
            e.preventDefault();
            // Ask user if he is sure.
            if (confirm(BooklyL10n.are_you_sure)) {
                var $item = $(this).closest('.ab-category-item');
                var data = { action: 'ab_delete_category', id: $item.data('id') };
                $.post(ajaxurl, data, function(response) {
                    // Remove category item from Services
                    $.each($('#services_list').find('select[name="category_id"]'), function(key, value) {
                        $(value).find('option[value="' + $item.data('id') + '"]').remove();
                    });
                    // Remove category item from DOM.
                    $item.remove();
                    if ($item.is('.ab-active')) {
                        location.reload(true);
                    }
                });
            }
        });

    // Services list delegated events.
    $('#ab_services_wrapper')
        // On click on 'Add Service' button.
        .on('click', 'a.add-service', function(e) {
            e.preventDefault();
            var ladda = Ladda.create( $(this).get(0) );
            ladda.start();
            var selected_category_id = $('#ab-categories-list .ab-active').data('id'),
                data = { action: 'ab_add_service' };
            if (selected_category_id) {
                data['category_id'] = selected_category_id;
            }
            $.post(ajaxurl, data, function(response) {
                refreshList(response.data.html,response.data.service_id);
                ladda.stop();
            });
        })
        // On click on 'Delete' button.
        .on('click', 'a.delete', function(e) {
            e.preventDefault();

            var for_delete = $('input:checkbox.service-checker:checked'),
                data = { action: 'ab_remove_services' },
                services = [],
                $panels = [];

            if (!for_delete.length) {
                alert(BooklyL10n.please_select_at_least_one_service);
                return false;
            }

            for_delete.each(function(){
                var panel = $(this).parents('.panel.service');
                $panels.push(panel);
                services.push(panel.data('service_id'));
            });
            data['service_ids[]'] = services;
            $.post(ajaxurl, data, function() {
                $.each($panels.reverse(), function (index) {
                    $(this).delay(500 * index).fadeOut(200, function () {
                        $(this).remove();
                    });
                });
            });
        })

        .on('change', 'input.all-staff, input.staff', function(){
            var $panel = $(this).parents('.panel.service');
            if ($(this).hasClass('all-staff')) {
                $panel.find('.staff').prop('checked', $(this).prop('checked'));
            } else {
                $panel.find('.all-staff').prop('checked', $panel.find('.staff:not(:checked)').length == 0);
            }
            updateStaffButton($panel);
        });

    // Modal window events.
    var $modal = $('#ab-staff-update');
    $modal
        .on('click', '.ab-yes', function() {
            $modal.modal('hide');
            if ( $('#ab-remember-my-choice').prop('checked') ) {
                update_staff_choice = true;
            }
            submitServiceFrom($modal.data('input'),true);
        })
        .on('click', '.ab-no', function() {
            if ( $('#ab-remember-my-choice').prop('checked') ) {
                update_staff_choice = false;
            }
            submitServiceFrom($modal.data('input'),false);
        });

    function refreshList(response,service_id) {
        var $list = $('#ab-services-list');
        $list.html(response);
        if (response.indexOf('panel') >= 0) {
            $no_result.hide();
            makeServicesSortable();
            onCollapseInitChildren();
        } else {
            $no_result.show();
        }
        $('#service_' + service_id).collapse('show');
        $('#service_' + service_id).find('input[name=title]').focus();
    }

    function initColorPicker($jquery_collection) {
        $jquery_collection.each(function(){
            $(this).data('last_color', $(this).val());
        });
        $jquery_collection.wpColorPicker();
    }

    function submitServiceFrom($form, update_staff) {
        $form.find('input[name=update_staff]').val(update_staff ? 1 : 0);
        var ladda = Ladda.create($form.find('button[type=submit]').get(0));
        ladda.start();
        $.post(ajaxurl, $form.serialize(), function (response) {
            if (response.success) {
                var $panel = $form.parents('.panel.service'),
                    $price = $form.find('[name=price]'),
                    $capacity = $form.find('[name=capacity]');
                $panel.find('span.badge').css('background-color', response.data.color);
                $panel.find('.panel-title a').html(response.data.title);
                $panel.find('.panel-title .ab-right-nav small').html(response.data.nice_duration + '<div class="ab-inline-block" style="width: 75px;text-align: right">' + response.data.price + '</div>');
                $price.data('last_value', $price.val());
                $capacity.data('last_value', $capacity.val());
                $('.notice-dismiss').unbind('click.wp-dismiss-notice').on('click', function() {
                    $(this).parents('.notice').fadeOut();
                });
                $('.notice-success').show();
                $.each(response.data.new_extras, function (front_id, real_id) {
                    var $li = $('li.extra.new[data-extra-id="' + front_id + '"]', $form);
                    $('[name^="extras"]', $li).each(function () {
                        var name = $(this).attr('name');
                        name = name.replace('[' + front_id + ']', '[' + real_id + ']');
                        $(this).attr('name', name);
                    });
                    $li.data('extra-id', real_id).removeClass('new');
                    $li.append('<input type="hidden" value="' + real_id + '" name="extras[' + real_id + '][id]">');
                });
            } else {
                alert(response.data.message);
            }
        }, 'json').always(function() {
            ladda.stop();
        });
    }

    function updateStaffButton($panel) {
        var staff_checked = $panel.find('.staff:checked').length;
        if (staff_checked == 0) {
            $panel.find('.staff-count').text(BooklyL10n.no_staff_selected);
        } else if (staff_checked == 1) {
            $panel.find('.staff-count').text($panel.find('.staff:checked').data('staff_name'));
        } else {
            $panel.find('.staff-count').text(staff_checked + '/' + $panel.find('.staff').length);
        }
    }

    var $category = $('ul#ab-category-item-list');
    $category.sortable({
        axis   : 'y',
        handle : '.ab-handle',
        update : function( event, ui ) {
            var data = [];
            $category.children('li').each(function() {
                var $this = $(this);
                var position = $this.data('id');
                data.push(position);
            });
            $.ajax({
                type : 'POST',
                url  : ajaxurl,
                data : { action: 'ab_update_category_position', position: data }
            });
        }
    });

    function makeServicesSortable() {
        if ($('.ab-main-category-item').hasClass('ab-active')) {
            var $services = $('#services_list'),
                fixHelper = function(e, ui) {
                    ui.children().each(function() {
                        $(this).width($(this).width());
                    });
                    return ui;
                };
            $services.sortable({
                helper : fixHelper,
                axis   : 'y',
                handle : '.ab-handle',
                update : function( event, ui ) {
                    var data = [];
                    $services.children('div').each(function() {
                        data.push($(this).data('service_id'));
                    });
                    $.ajax({
                        type : 'POST',
                        url  : ajaxurl,
                        data : { action: 'ab_update_services_position', position: data }
                    });
                }
            });
        } else {
            $('#services_list .ab-handle').hide();
        }
    }
    function onCollapseInitChildren() {
        $('.panel-collapse').on('show.bs.collapse.bookly', function () {
            initColorPicker($(this).find('.service-color'));
            $(this).find('.ab-popover-ext').popover({
                trigger: 'hover',
                content: function () {
                    return $('#' + $(this).data('ext_id')).html()
                },
                html: true
            });
            updateStaffButton($(this).parents('.panel.service'));

            $(this).find('.ajax-service-send').on('click', function (e) {
                e.preventDefault();
                var $form = $(this).parents('form'),
                    show_modal = false;
                if(update_staff_choice === null) {
                    $('.ab-question', $form).each(function () {
                        if ($(this).data('last_value') != $(this).val()) {
                            show_modal = true;
                        }
                    });
                }
                if (show_modal) {
                    $modal.data('input', $form).modal('show');
                } else {
                    submitServiceFrom($form, update_staff_choice);
                }
            });

            $(this).find('.js-reset').on('click', function (e) {
                $(this).parents('form').trigger('reset');
                var $color = $(this).parents('form').find('.service-color'),
                    $panel = $(this).parents('.panel.service');
                $color.val($color.data('last_color')).trigger('change');
                updateStaffButton($panel);
            });
            $(this).find('.ab-question').each(function () {
                $(this).data('last_value', $(this).val());
            });
            $(this).unbind('show.bs.collapse.bookly');
        });
    }
    makeServicesSortable();
    onCollapseInitChildren();

    /*<Extras>*/
    $('.extras-container').sortable({
        axis   : 'y',
        handle : '.ab-handle',
        update : function( event, ui ) {
            var data = [];
            $(this).find('li.extra').each(function() {
                data.push($(this).data('extra-id'));
            });
            $.ajax({
                type : 'POST',
                url  : ajaxurl,
                data : { action: 'ab_update_extra_position', position: data }
            });
        }
    });

    $(document).on('click', '.panel.service fieldset .extra-new', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var children = $('.extras-container li');

        var id = 1;
        children.each(function (i, el) {
            var elId = parseInt($(el).data('extra-id'));
            id = (elId >= id) ? elId + 1 : id;
        });
        var template = $('.ab--extra-template').html();
        var $container = $(this).parents('.panel.service').find('.extras-container');
        $container.append(
            template
                .replace(/%id%/g, id)
        );
    });

    $(document).on('click', '.panel.service fieldset .extra-attachment', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var extra = $(this).parents('li.extra');
        var frame = wp.media({
            library: {type: 'image'},
            multiple: false
        });
        frame.on('select', function () {
            var selection = frame.state().get('selection').toJSON(),
                img_src
            ;
            if (selection.length) {
                if (selection[0].sizes['thumbnail'] !== undefined) {
                    img_src = selection[0].sizes['thumbnail'].url;
                } else {
                    img_src = selection[0].url;
                }
                extra.find("[name='extras[" + extra.data('extra-id') + "][attachment_id]']").val(selection[0].id);
                extra.find('.extra-attachment-image').attr('src', img_src).show();
                extra.find('.remove-attachment').show();
                $(this).hide();
            }
        });

        frame.open();
    });

    $(document).on('click', '.panel.service fieldset .remove-attachment', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var extra = $(this).parents('li.extra');
        extra.find("[name='extras[" + extra.attr('data-id') + "][attachment_id]']").attr('value', '');
        $(this).hide();
        extra.find('.extra-attachment-image').hide();
        extra.find('.extra-attachment').show();
    });

    $(document).on('click', '.panel.service fieldset .extra-delete', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var extra = $(this).parents('li.extra');
        if (!extra.hasClass('new')) {
            $.post(ajaxurl, {action: 'ab_delete_service_extra', id: extra.data('extra-id')}, function () {
            });
        }
        extra.remove();
    });
    /*</Extras>*/
});
