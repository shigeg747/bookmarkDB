/**---------------------------------------------------------------
 * 変数定義
--------------------------------------------------------------- */

var searchItem = '.search_item';   // 絞り込む項目を選択するエリア
var listItem = '.list_item';       // 絞り込み対象のアイテム
var hideClass = 'is-hide';         // 絞り込み対象外の場合に付与されるclass名
var activeClass = 'is-active';     // 選択中のグループに付与されるclass名



/**---------------------------------------------------------------
 * 検索イベント
--------------------------------------------------------------- */


//種類別検索-------------------------------------------------------------

// let group = "";

$(function() {
  $("#find").change(function() {
    $(searchItem).removeClass(activeClass);
    group = $('option:selected').addClass(activeClass).data('group');
    search_filter(group);
  });
});

/**
 * リストの絞り込みを行う
 * @param {String} group data属性の値
 */

function search_filter(group) {
  // console.log(group);
  // 非表示状態を解除
  $('.is-hide').removeClass(hideClass);
  // 値が空の場合はすべて表示
  if(group === '') {
    return;
  }
  // リスト内の各アイテムをチェック
  for (var i = 0; i < $(listItem).length; i++) {
    // アイテムに設定している項目を取得
    var itemData = $(listItem).eq(i).data('group');
    // 絞り込み対象かどうかを調べる
    if(itemData !== group) {
      $(listItem).eq(i).addClass(hideClass);
    }
  }
}

//種類別検索-------------------------------------------------------------

$(function() {
  const $searchInput = $('#search-text'); // 入力エリア
  let $searchElem  = $('.list_item');// 絞り込む要素
  let hideClass = 'is-hide';  // 絞り込み対象外の要素に付与するclass

  // 絞り込み処理
  function extraction() {
      var keywordArr = $searchInput.val().toLowerCase().replace('　', ' ').split(' '); // 入力文字列を配列に格納
      $searchElem.removeClass(hideClass).show();// 現在非表示にしているリストを表示する
      for (var i = 0; i < keywordArr.length; i++) {
          for (var j = 0; j < $searchElem.length; j++) {
              var thisString = $searchElem.eq(j).text().toLowerCase();
              // var item_group = $searchElem.eq(j).data('group');
              // var item_num = $searchElem.eq(j).data('num');

              // console.log(item_group,item_num);
              if(thisString.indexOf(keywordArr[i]) == -1) { // 入力文字列と一致する文字列がない場合
                $(listItem).eq(j).addClass(hideClass); // 絞り込み対象外のclass付与
              }
          }
      }
      // $('.' + hideClass).hide(); // 絞り込み対象外の要素の非表示
  }

  $searchInput.on('load keyup blur', function() {
      extraction();
  });
});

//input---------------------------------------------------------------
// function searchWord(){
//   let result
//   let search = $(this).val(); // 検索する値
//   let target;
//   let hit;

//   // 検索結果の配列を用意
//   result = [];
//   exwords = [];
// console.log(result);
//   // 検索結果エリアの表示を空にする
//   $('#search-result__list').empty();
//   $('.search-result__hit-num').empty();

//   // 検索ボックスに値が入ってる場合
//   if (search != '') {
//     let unlist = $('.listed').not('.is-hide');
//         unlist.each(function() {
//         target = $(this).text();

//         exwords.push(target);

//       // console.log(target);
//       // 検索対象となるリストに入力された文字列が存在するかどうかを判断
//       if (target.indexOf(search) != -1) {
//         // 存在する場合はそのリストのテキストを用意した配列に格納
//         result.push(target);
//         // target.hide(!search);
//       }


//     });
//     // console.log(result);

//     // let list =$('.list_item').text();
//     // console.log(list);
//     // // 検索結果をページに出力
//     for (let i = 0; i < result.length; i ++) {
//       // console.log(result[i]);
//       // if(!result[i] != target){
//       //   $('.list_item').eq(i).addClass(hideClass);
//       // }
//       $('<p>').text(result[i]).appendTo('#search-result__list');
//     }
//     // ヒットの件数をページに出力
//     hit = '<span class="search-result_words">検索結果</span>：' + result.length + '件見つかりました。';
//     $('.search-result__hit-num').append(hit);
//   }
//   $(".search-result__hit-num").css("background-color","#90b0d");

// };

//   // searchWordの実行
//   $('#search-text').on('input', searchWord);

//input---------------------------------------------------------------


// $(".search_btn").on('click',function(){
//   searchWord();
//   search_filter();
// });

//success-------------------------------------------------------------
// $(function() {
//   // 絞り込みを変更した時
//   $(searchItem).on('click', function() {
//     $(searchItem).removeClass(activeClass);
//     var group = $(this).addClass(activeClass).data('group');
//     search_filter(group);
//     console.log(group);

//   });
// });

// /**
//  * リストの絞り込みを行う
//  * @param {String} group data属性の値
//  */
// function search_filter(group) {
//   console.log(group);
//   // 非表示状態を解除
//   $(listItem).removeClass('.list_item',hideClass);
//   // 値が空の場合はすべて表示
//   if(group === '') {
//     return;
//   }
//   // リスト内の各アイテムをチェック
//   for (var i = 0; i < $(listItem).length; i++) {
//     // アイテムに設定している項目を取得
//     var itemData = $(listItem).eq(i).data('group');
//     // 絞り込み対象かどうかを調べる
//     if(itemData !== group) {
//       $(listItem).eq(i).addClass(hideClass);
//     }
//   }
// }
//success-------------------------------------------------------------



//input---------------------------------------------------------------
searchWord = function(){
  let result
  let search = $(this).val(); // 検索する値
  let target;
  let hit;

  // 検索結果の配列を用意
  result = [];

  // 検索結果エリアの表示を空にする
  $('#search-result__list').empty();
  $('.search-result__hit-num').empty();

  // 検索ボックスに値が入ってる場合
  if (search != '') {
    $('table tbody td').each(function() {
      target = $(this).text();
      // console.log(target);
      // 検索対象となるリストに入力された文字列が存在するかどうかを判断
      if (target.indexOf(search) != -1) {
        // 存在する場合はそのリストのテキストを用意した配列に格納
        result.push(target);
        // target.hide(!search);
      }

    });


    // // 検索結果をページに出力
    for (let i = 0; i < result.length; i ++) {
      $('<p>').text(result[i]).appendTo('#search-result__list');
    }
    // ヒットの件数をページに出力
    hit = '<span class="search-result_words">検索結果</span>：' + result.length + '件見つかりました。';
    $('.search-result__hit-num').append(hit);
  }
  $(".search-result__hit-num").css("background-color","#90b0d");

};

  // searchWordの実行
  $('#search-text').on('input', searchWord);

  //input---------------------------------------------------------------

  //種類別検索ボタン-------------------------------------------------------------

// let group = "";

// $(function() {
//   $("#find").change(function() {
//     $(searchItem).removeClass(activeClass);
//     group = $('option:selected').addClass(activeClass).data('group');
//     // search_filter(group);
//   });
// });

// /**
//  * リストの絞り込みを行う
//  * @param {String} group data属性の値
//  */

// function search_filter() {
//   console.log(group);
//   // 非表示状態を解除
//   $('.is-hide').removeClass(hideClass);
//   // 値が空の場合はすべて表示
//   if(group === '') {
//     return;
//   }
//   // リスト内の各アイテムをチェック
//   for (var i = 0; i < $(listItem).length; i++) {
//     // アイテムに設定している項目を取得
//     var itemData = $(listItem).eq(i).data('group');
//     // 絞り込み対象かどうかを調べる
//     if(itemData !== group) {
//       $(listItem).eq(i).addClass(hideClass);
//     }
//   }
// }

//種類別検索-------------------------------------------------------------

$(document).on('click', '#customInfobox', function(){
  let infoboxTemplate =   `<div class="modal-content" id="modal-content">
                              <div class="topline">
                                  <div class="username" id="username">${username}</div>
                                  <div class="age" id="age">${age}</div>
                              </div>
                              <div class="title" id="title">${title}</div>
                              <div class="contents" id="contents">${contents}</div>
                              <input type="button" class="videogo" id="videogo" value="ビデオ通話する">
                              <input type="button" class="modal-close" id="modal-close" value="閉じる">
                          </div>`;
  // console.log(infoboxTemplate);

  $('main').append(infoboxTemplate);

  $('#videogo').on('click',function(){


      $('#modal-content,#modal-overlay').fadeOut('solw', function(){

          // #modal-overlayを削除する
          $('#modal-content,#modal-overlay').remove();
      });
  })

  //キーボード操作などにより、オーバーレイが多重起動するのを防止
  $(this).blur();
  if($('#modal-overlay')[0]) return false; //新しくモーダルウィンドウを起動しない (防止策1)

  //オーバーレイを出現させる
  $('main').append( '<div class="modal-overlay" id="modal-overlay"</div>' );
  $('#modal-overlay').fadeIn('slow');

  centeringModalSyncers()

  //コンテンツをフェードインする
  $('#modal-content').fadeIn('slow');

  // #modal-content,#modal-overlayをクリックして
  $('#modal-close,#modal-overlay').unbind().click(function(){

      // #modal-content,#modal-overlayをフェードアウトして
      $('#modal-content,#modal-overlay').fadeOut('solw', function(){

          // #modal-overlayを削除する
          $('#modal-content,#modal-overlay').remove();
      });
  });

  // const target = document.getElementById('videogo');
  // target.href = "vdsk.html"

  // $('#videogo').on('click', function(target){
  //      window.location.href = "vdsk.html";
  // });


  //リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
  $(window).resize(centeringModalSyncers);

  // センタリングを実行する関数
  function centeringModalSyncers(){

      // 画面（ウィンドウ）の幅、高さを取得
      let w = $(window).width();
      let h = $(window).height();

      // コンテンツ(#modal-content)の幅、高さを取得
      let cw = $("#modal-content").outerWidth();
      let ch = $("#modal-content").outerHeight();

　　　　　// （ウィンドウ）から(#modal-content)を引いたあまりの余白を2で割りセンタリングを実行する
      $("#modal-content").css({ "left": ( (w - cw) /2 ) + "px", "top": ( ( h - ch ) /2 ) +"px" } );
  }
});
