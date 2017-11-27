$(function(){
      /*
       * HOME "LIST DESIGNS" SECTION TABS
       */
      [].slice.call(document.querySelectorAll('.list-items-wrapper')).forEach(function(menu) {
            var menuItems = menu.querySelectorAll('.list-item-link'),
                  setCurrent = function(ev) {
                        ev.preventDefault();

                        var item = ev.target;
   
                        // return if already current
                        if (classie.has(ev.target, 'active')) {
                              return false;
                        }

                        // remove current
                        $('.'+menu.querySelector('.active').id).addClass('hide');
                        classie.remove(menu.querySelector('.active'), 'active');

                        // set current
                        $('.'+item.id).removeClass('hide');
                        classie.add(item, 'active');
                  };

            [].slice.call(menuItems).forEach(function(el) {
                  el.addEventListener('click', setCurrent);
            });
      });


      // track which page w/ results should be loaded on btn click
      var pageRecent = pagePopular = 1;

      // take the results from the db & append them to the existing ones 
      $('#load-more-btn').on('click', function(){
            var listed = document.querySelector('.list-item-link.active').id;
            var orderArray = {'list-recent': 'created_at', 'list-popular': 'views'};
            var order = orderArray[listed];

            switch(listed) {
                  case 'list-recent':
                        pageRecent++; //page number increment
                        load_more(pageRecent, order, listed); //load content 
                  break;
                  case 'list-popular':
                        pagePopular++; //page number increment
                        load_more(pagePopular, order, listed); //load content 
                  break;
            }   
      });
      
});

/**
 * Ajax call for getting the needed items from the db
 *
 * @param {Integer}  page [particular page of results that should be loaded]
 * @param {String}  order [db column used for results ordering]
 * @param {String}  activeDiv [Active (recent OR popular) section]
 */   
function load_more(page, order, activeDiv)
{
      $.ajax({
            url: globalAssetUrl + 'jquery-loadmore?order='+order+'&page='+page,
            type: 'get',
            datatype: 'json'
      }).done(function(items){
            if(items.data.length == 0) return;
            addStaticItems(items.data, activeDiv);         
      }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
      });
}

/**
 * Statically add new items to the HOME page on button click
 *
 * @param {Array}  items [items/designs that should be statically set]
 * @param {String}  activeDiv [Active (recent OR popular) section]
 */
var addStaticItems = function(items, activeDiv) {

    $.each(items, function(key, item) {
        if($('.'+activeDiv).length){
            var $designBlock = $('.single-item.default').clone();
            $designBlock.removeClass('default hide');
            $designBlock.find('img').attr('src', 'storage/designs/'+item.id+'/'+item.regular_thumbnail)
            .next().find('span.si-label').text(item.categories.name)
            .next('span.si-title').text(item.title);
            $('.'+activeDiv).append($designBlock);
        }
    });
};