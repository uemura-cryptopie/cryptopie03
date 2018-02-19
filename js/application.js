/***********************************************************
 * コンテンツ毎の共通JS
 * create :
 * update :
 * 必須JS  ： 
 **********************************************************/

var App = App || {};

App = (function($, window, document){
    
    var App = {};
    
    App.TEST = true; // デバックフラグ
    App.BASE_URL = "";
    App.BASEPATH   = "/";
    
    // -------------------------------------------------
    // グローバル設定
    // -------------------------------------------------
    
    if (!window.console) console = {log: function() {}};
    
    if (typeof Object.create !== 'function') {
        Object.create = function(o, props) {
            function F() {}
            F.prototype = o;
            if (typeof(props) === "object") {
                for (var prop in props) {
                    if (props.hasOwnProperty((prop))) {
                    F[prop] = props[prop];
                    }
                }
            }
            return new F();
        };
    }
    
    if (App.TEST) {
        window.onerror = function (message, url, line, column, errorObj) {
            // console.log("message : " + message +
            //             ",\n url : " + url +
            //             ",\n line : " + line  +
            //             ",\n column : " + column  +
            //             ",\n error : " + (errorObj ? errorObj.stack : ""));
            
            console.table({
                        'message' : message,
                        'url' : url,
                        'line' : line ,
                        'column' : column,
                        'error' : (errorObj ? errorObj.stack : "")
                    });
                
            return false;
        };
    }
    
    if (!Array.prototype.indexOf) {
      Array.prototype.indexOf = function(elt /*, from*/)
      {
        var len = this.length >>> 0;

        var from = Number(arguments[1]) || 0;
        from = (from < 0) ? Math.ceil(from) : Math.floor(from);
        if (from < 0)
          from += len;

        for (; from < len; from++)
        {
          if (from in this &&
              this[from] === elt)
            return from;
        }
        return -1;
      };
    }
    
    
    // -------------------------------------------------
    // 共通
    // -------------------------------------------------
    App.Common = function () {
        
    };
    
    var Common = App.Common.prototype;
    
    /**
     * Ajaxで取得したJSONデータを加工
     * @param {object} obj $.ajaxの引数
     */
    Common.setJsonData = function(obj) {
        var self     = this,
            xhr      = $.ajax({
                type: (obj.type) ? obj.type : 'post',
                url: obj.url,
                data: obj.data,
                dataType: (obj.dataType) ? obj.dataType : 'json',
                scriptCharset: 'utf-8'
            }),
            successFn = obj.success,
            errorFn   = obj.error || function(result){
                alert("通信エラーによりデータを取得できませんでした");
            };
        
        if (typeof successFn === "function") {
            xhr.done(function(result){
                successFn(result);
            });
        }
        xhr.fail(function(result){
            errorFn('error!');
        });
        
        return xhr;
    };
    
    /**
     * モーダルウィンドウ
     * @param  {object} options オプションオブジェクト
     */
    Common.modal = function(){
        return {
            init : function(options){
                this.overlayID = "lean_overlay";
                if (!$("#"+this.overlayID).length) {
                    $("body").append($("<div id='"+this.overlayID+"' />"));
                }
                this.defaults = {
                    element:"",
                    href:"",
                    top:100,
                    overlay:0.5,
                    closeButton:".modal_window_close"
                };
                this.o        = $.extend(this.defaults, options);
                this.$modal   = $(this.o.href);
                this.speed    = 200;
                this.openFlag = true;
                this.$overlay = $("#"+this.overlayID);
                
                this.event();
            },
            event : function(){
                var self = this;
                if (self.o.element) {
                    $(self.o.element).on("click", function(e){
                        e.preventDefault();
                        
                        if (self.openFlag) {
                            self.open($(this));
                        } else {
                            
                        }
                    });
                }
            },
            open : function($button){
                var self = this;
                self.$modal = self.o.href ? self.$modal : $($elm.attr("href"));
                var modal_height = self.$modal.outerHeight(),
                    modal_width  = self.$modal.outerWidth();
                
                $(self.o.closeButton + ', #' + self.overlayID).on("click", function(e){
                    e.preventDefault();
                    self.close(self.$modal);
                });
                self.$overlay.css({"display":"block", opacity:0}).fadeTo(self.speed, self.o.overlay);
                self.$modal
                    .css({"display":"block","position":"fixed","opacity":0,"z-index":11000,"left":50+"%","margin-left":-(modal_width/2)+"px","top":self.o.top+"px"})
                    .fadeTo(self.speed, 1);
                
                if (typeof self.o.callback === "function") {
                    self.o.callback(self, self.$modal);
                }
            },
            cangeOpenFlag : function(flag) {
                var self = this;
                self.openFlag = flag;
            },
            close : function($elm){
                var self = this;
                self.$overlay.fadeOut(self.speed);
                $elm.css({"display":"none"});
                if (typeof self.o.closeCallback === "function") {
                    self.o.closeCallback();
                }
            }
        };
    };
    
    
    
    // -------------------------------------------------
    // 共通クラス
    // -------------------------------------------------
    App.Main = function () {
        App.Common.apply(this, arguments);
        this.initialize.apply(this, arguments);
    };
    
    // Common継承
    App.Main.prototype = Object.create(App.Common.prototype, {
        constructor: {value: App.Main, enumerable: false}
    });
    
    var Main = App.Main.prototype;
    
    // 初期化
    Main.initialize = function (base_url) {
        App.BASE_URL = base_url;
        
        this.tabHash();
        this.events();
    };
    
    // イベント登録
    Main.events = function () {
        var self = this;
        
    };
    
    // タブハッシュリンク設定
    Main.tabHash = function () {
        var self = this;
        if (location.hash) {
            $("a[href='" + location.hash + "']").tab("show");
        }
        $(document.body).on("click", "a[data-toggle]", function(event) {
            var uri = window.location.toString();
            if (uri.indexOf("#") > 0) {
                var clean_uri = uri.substring(0, uri.indexOf("#"));
                window.history.replaceState({}, document.title, clean_uri);
            }
        });
        $(window).on("popstate", function() {
            var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
            $("a[href='" + anchor + "']").tab("show");
        });
    };
    
    /**
     * bitcoin ticker取得
     * @param  {string} elm 指定要素名
     * @param  {string} url ajaxURL
     */
    Main.ticker = function(options, opt_callback) {
        this.defaults = {};
        this.o        = $.extend(this.defaults, options);
        this.callback = opt_callback;
        this.url      = App.BASEPATH + "mypage/index/ticker/"
        this.referenceJPY = new Form.referenceJPY({useAmountBox:false});
        this.init();
    };
    Main.ticker.prototype = 
    {
        init : function() {
            var self = this;
            self.execution();
            setInterval(function(){
                self.execution();
            }, 10000);
        },
        execution : function() {
            var self = this;
            var ajax = self.ajax();
            ajax.done(function(data){
                var amount = $('#tradeAmount').val();
                $('#price-ask').text(money_format(data.adj_ask));
                $('#price-bid').text(money_format(data.adj_bid));
                
                self.referenceJPY.update(amount);
                
            });
        },
        ajax : function(){
            var self  = this;
            return $.ajax({
                url: self.url,
                type: 'post',
                dataType: "json"
            });
        }
    };
    
    
    // -------------------------------------------------
    // FORMクラス
    // -------------------------------------------------
    App.Form = function () {
        App.Common.apply(this, arguments);
        this.initialize.apply(this, arguments);
    };
    
    // Common継承
    App.Form.prototype = Object.create(App.Common.prototype, {
        constructor: {value: App.Form, enumerable: false}
    });
    
    var Form = App.Form.prototype;
    
    // 初期化
    Form.initialize = function () {
        
        this.numOnry();
        this.events();
    };
    
    // イベント登録
    Form.events = function () {
        var self = this;
        
        
    };
    
    // 現在時刻取得
    Form.getNowDate = function(){
        var date = new Date(),
            year = date.getFullYear(),
            mon  = ("0"+(date.getMonth()+1)).slice(-2),
            day  = ("0"+date.getDate()).slice(-2);
        return {
            'year':year,
            'mon':mon,
            'day':day
        };
    };
    
    // 誕生日から年齢計算
    Form.calculateAge = function(birthday) {
        var  birth = birthday.split('/');
        var _birth = parseInt("" + birth[0] + birth[1] + birth[2]);
        var  today = this.getNowDate();
        var _today = parseInt("" + today.year + today.mon + today.day);
        return parseInt((_today - _birth) / 10000);
    };
    
    // formの戻るボタン機能
    Form.formBack = function(options) {
        var defaults = { button:"#js_formBack", form:"", url:"" };
        var o     = $.extend(defaults, options);
        var $btn  = $(o.button);
        var $form = (o.form) ? $(o.form) : $btn.closest('form');
        $btn.on('click', function(event) {
            event.preventDefault();
            if (o.url) {
                $form.attr('action', o.url);
                // jquery validate pluginの検証を回避しながらsubmit
                $form[0].submit();
            } else {
                history.back();
            }
        });
    };
    
    // 口座名義にお名前のフリガナを入れる
    Form.setBankNameToKana = function(kana, bank) {
        var $kana = $(kana).find('input');
        $kana.on('keyup focusout', function() {
            var str = [];
            $kana.each(function(index, el) {
                str.push($(this).val());
            });
            $(bank).val(str.join(' '));
        });
    };
    
    // 年齢計算
    Form.ageCalculation = function() {
        var self = this;
        setAge();
        $('#birth_year, #birth_month, #birth_day').on('change', function() {
            setAge();
        });
        function setAge(){
            var year  = $('#birth_year').val(),
                month = $('#birth_month').val(),
                day   = $('#birth_day').val(),
                $age  = $('#currentAge'),
                num   = 0;
            if (year && month && day) {
                num = self.calculateAge(year +"/"+ month +"/"+ day );
                $age.html('（満：<span id="ageNum">'+num+'</span>歳）');
            }
        }
    };
    
    // 数字キー判定
    Form.checkNumKey = function(event) {
        var evt = event || window.event;
        var c = evt.keyCode;
        // Shiftキー無効
        if (evt.shiftKey) {
            if (c !== 9) {
                return false;
            }
        }
        if((48<=c && c<=57) || (96<=c && c<=105) || c==8 || c == 9 || c == 13 || c == 37 || c == 39 || c == 46 || c == 18 || c == 109 || c == 110 || c == 189 || c == 229 || c == 190 || (112<=c && c<=123) ){
            return c;
        }
        return false;
    };
    
    // 数字のみ設定
    Form.numOnry = function() {
        var self = this,
            $elm = $('.js_numOnry');
        $elm.attr('pattern', '\\d*');
        $elm.on('keydown keyup', self.checkNumKey);
    };
    
    /**
     * 郵便番号住所検索
     * @param  {Object} options 郵便番号のinput要素と返り値を入れる要素の指定
     *         { zip_elm1, zip_elm2, pref_kana, pref, city_kana, city, address_kana, address }
     * @param  {[function]} opt_callback [description]
     */
    Form.insertAddress = function(options, opt_callback) {
        this.defaults = {
            zip_elm1    : '#user_zip1',
            zip_elm2    : '#user_zip2',
            pref        : "#pref",
            pref_kana   : "#pref_kana",
            city        : "#city",
            city_kana   : "#city_kana",
            address     : "#address1",
            address_kana: "#address1_kana",
            button      : "#zip_btn"
        };
        this.o        = $.extend(this.defaults, options);
        this.callback = opt_callback;
        this.init();
    };
    Form.insertAddress.prototype = {
        init : function() {
            this.event();
        },
        event : function() {
            var self = this;
            $(self.o.zip_elm1).jpostal({
                click : self.o.button,
                postcode : [
                    self.o.zip_elm1,
                    self.o.zip_elm2
                ],
                address : self.o.address,
                callback : function (address) {
                    if (typeof self.o.callback === "function") {
                        self.o.callback();
                    }
                }
            });
        },
        clear : function() {
            // 初期化処理
        }
    };
    
    /**
     * 銀行選択
     * @return {[type]} [description]
     */
    Form.selectBank = function(options, opt_callback) {
        this.defaults = { };
        this.obj      = $.extend(this.defaults, options);
        this.callback = opt_callback;
        this.init();
    };
    Form.selectBank.prototype = {
        init : function() {
            this.$elm       = $(this.obj.selecter);
            this.$initials  = this.$elm.find(".bankSelect_initials");
            this.$initialsBody = this.$elm.find(".bankSelect_initials--body");
            this.$search    = this.$elm.find(".bankSelect_search--code");
            this.$list      = this.$elm.find(".bankSelect_list");
            this.$flow      = this.$elm.find(".backSelect_flow");
            this.$loading   = this.$elm.find(".bankSelect_loading");
            this.modalObj   = this.obj.modal;
            this.validator  = this.obj.validator;
            this.ajaxObj    = undefined;
            this.shopList   = undefined;
            this.branchList = undefined;
            this.branchFlag = false;
            this.selectData = {};
            this.spFlag     = false;
            
            this.changeFlow(1);
            this.$initialsBody.show();
            this.$initials.find("a").attr('class','');
            this.$initials.find('.bankSelect_heading').text("金融機関の頭文字から探す");
            this.$search.find('.bankSelect_heading').text("銀行コードから検索");
            this.$list.find('.bankSelect_heading').text("以下の金融機関から選択");
            this.$search.show();
            this.$search.find('input').val("").attr('placeholder', '銀行コード');
            this.$list.find('ul').html('');
            this.$loading.hide();
            
            this.spFlag = ($(window).width() <= 480);
            
            this.event();
            this.getShopList();
            
        },
        event : function() {
            var self = this;
            
            $(window).resize(function(){
                var w = $(window).width();
                var x = 480;
                if (w <= x) {
                    self.spFlag = true;
                } else {
                    self.spFlag = false;
                    self.$initialsBody.show();
                }
            });
            
            // 頭文字 クリックイベント
            self.$initials.on('click', 'a', function(e) {
                e.preventDefault();
                var $this = $(this);
                if (!$this.hasClass('bankSelect_initials--none')) {
                    self.$initials.find("a").removeClass('bankSelect_initials--active');
                    $this.addClass('bankSelect_initials--active');
                    
                    self.createShopList(self.selectShopList($this.attr('href')));
                    self.slideUp();
                }
            });
            
            // 金融機関リスト クリックイベント
            self.$list.on('click', 'a', function(e) {
                e.preventDefault();
                if (!self.branchFlag) {
                    self.selectData.bankID = $(this).attr("href");
                    self.selectData.bankName = $(this).text();
                    self.slideDown();
                    self.changeBranch($(this).attr("href"));
                } else {
                    self.selectData.branchID = $(this).attr("href");
                    self.selectData.branchName = $(this).text();
                    self.setBankData();
                }
            });
            
            // 金融コードで検索
            self.$search.on('click', 'button', function(e) {
                self.searchCode();
                self.slideUp();
            });
        },
        close : function() {
            if (!this.spFlag) { return; }
            $("html,body").animate({scrollTop:$('#bankEditArea').offset().top});
        },
        // ひらがなボタンの見た目を変更する
        setInitials : function() {
            var self = this,
                shop = self.setShopList();
            self.$initials.find("a").removeClass('bankSelect_initials--active');
            $.each(shop, function(index, el) {
                if (shop[index].length === 0) {
                    self.$initials.find("a[href = '"+index+"']").addClass('bankSelect_initials--none');
                }
            });
        },
        // 店舗リスト作成
        createShopList : function(data) {
            var $list = this.$list.find('ul');
            $list.html('');
            for (var i = 0, len = data.length; i < len; i++) {
                $list.append('<li>・<a href="'+data[i].code+'">'+data[i].name+'</a></li>');
            }
        },
        // Ajaxでjsonデータ取得
        getShopList : function(opt_code) {
            var self = this;
            if (!self.branchFlag) {
                self.ajaxObj = Form.setJsonData({
                    url: self.obj.shopUrl,
                    type: 'post',
                    data: {},
                    dataType: "json",
                    success: function(json, textStatus) {
                        self.shopList = json;
                    }
                });
            } else {
                self.ajaxObj = Form.setJsonData({
                    url: self.obj.branchUrl,
                    type: 'post',
                    data: { "bank_id":opt_code },
                    dataType: "json",
                    success: function(json, textStatus) {
                        self.branchList = json;
                    }
                });
            }
        },
        slideUp : function() {
            if (!this.spFlag) { return; }
            this.$initialsBody.slideUp('fast');
            this.$search.slideUp('fast');
            this.$initials.find('.bankSelect_heading').addClass('js_active');
        },
        slideDown : function() {
            if (!this.spFlag) { return; }
            this.$initialsBody.slideDown('fast');
            this.$search.slideDown('fast');
            this.$initials.find('.bankSelect_heading').removeClass('js_active');
        },
        setShopList :function() {
            return (!this.branchFlag) ? this.shopList : this.branchList;
        },
        // opt_codeの店舗を返す
        selectShopList : function(opt_code) {
            var self = this,
                shop = self.setShopList();
            return shop[opt_code].shop;
        },
        
        // コード検索
        searchCode : function() {
            var self = this,
                $search = self.$search.find('input'),
                code = $search.val(),
                shop = (!self.branchFlag) ? self.shopList : self.branchList,
                results = [];
            $.each(shop, function(index, el) {
                var arr = $.grep(shop[index].shop, function( n, i ) {
                        return (~n.code.indexOf(code));
                    });
                if (arr.length) {
                    Array.prototype.push.apply(results, arr);
                }
            });
            
            self.createShopList(results);
            
        },
        
        // Flow更新
        changeFlow : function(num) {
            this.$flow.find("li").removeClass('-active');
            this.$flow.find("li:eq("+(num-1)+")").addClass('-active');
        },
        // 支店選択へ移行
        changeBranch : function(code) {
            var self = this;
            self.$loading.show();
            self.branchFlag = true;
            self.getShopList(code);
            self.ajaxObj.done(function(){
                setTimeout(function(){
                    self.changeFlow(2);
                    self.setInitials();
                    self.$list.find('ul').html('');
                    self.$initials.find('.bankSelect_heading').text("支店名の頭文字から探す");
                    self.$search.find('.bankSelect_heading').text("支店コードから検索");
                    self.$search.find('input').val("").attr('placeholder', '支店コード');
                    self.$list.find('.bankSelect_heading').text("以下の支店を選択");
                    self.$loading.hide();
                }, 1000);
            }).fail(function(result){
                errorFn('error!');
            });
        },
        // フォーム入力欄にデータを反映
        setBankData : function() {
            var self = this;
            
            $('#js_bank_id').val(self.selectData.bankID);
            $('#js_bank_name').val(self.selectData.bankName);
            $('#js_branch_id').val(self.selectData.branchID);
            $('#js_branch_name').val(self.selectData.branchName);
            
            // self.validator.element("#js_bank_id");
            // self.validator.element("#js_bank_name");
            // self.validator.element("#js_branch_id");
            // self.validator.element("#js_branch_name");
            
            self.close();
        }
    };
    
    
    /**
     * 日付をフォーマットする
     * @param  {Date}   date     日付
     * @param  {String} [format] フォーマット
     * @return {String}          フォーマット済み日付
     */
    Form.formatDate = function (dateStr, format) {
        var date = new Date(dateStr);
        if (!format) format = 'YYYY-MM-DD hh:mm:ss.SSS';
        format = format.replace(/YYYY/g, date.getFullYear());
        format = format.replace(/MM/g, ('0' + (date.getMonth() + 1)).slice(-2));
        format = format.replace(/DD/g, ('0' + date.getDate()).slice(-2));
        format = format.replace(/hh/g, ('0' + date.getHours()).slice(-2));
        format = format.replace(/mm/g, ('0' + date.getMinutes()).slice(-2));
        format = format.replace(/ss/g, ('0' + date.getSeconds()).slice(-2));
        if (format.match(/S/g)) {
            var milliSeconds = ('00' + date.getMilliseconds()).slice(-3);
            var length = format.match(/S/g).length;
            for (var i = 0; i < length; i++) format = format.replace(/S/, milliSeconds.substring(i, i + 1));
        }
        return format;
    };
    
    
    /**
     * 時間がかかる処理にローディング画面を表示する
     * @param  {object}   option  ラジオボタンをwpapしている要素
     */
    Form.submitLoading = function(option){
        var o = option ? option : {};
        
        $(o.form).on('submit', function(event) {
            var $self = $(this);
            $(o.loading).fadeIn(200);
        });
    };
    
    /**
     * パスワード表示切替
     * @param  {string} elm パスワード切替発動ID
     */
    Form.showPassword = function(elm){
        var self = this,
            $elm = $(elm),
            $row = $elm.find('.form-group');
        $elm.addClass('showPassword');
        $row.find('a').on('click', function(event) {
            event.preventDefault();
            var $input = $(this).closest('div').prev().find('input');
            if ($input.attr('type') === 'text') {
                $input.prop('type', 'password');
                $(this).text('表示する');
            } else {
                $input.prop('type', 'text');
                $(this).text('隠す');
            }
        });
    };
    
    /**
     * 会員ID検索AJAX
     * @param  {string} elm 指定要素名
     * @param  {string} url ajaxURL
     */
    Form.checkOverlapUser = function(options, opt_callback) {
        this.defaults = { url:"" };
        this.o        = $.extend(this.defaults, options);
        this.$result = $('#overlapResult');
        this.callback = opt_callback;
        this.init();
    };
    Form.checkOverlapUser.prototype = 
    {
        init : function() {},
        check : function(form){
            var self  = this;
            var ajax = self.ajax();
            ajax.done(function(data){
                self.$result.attr('data-result', data.duplicate);
                if (data.duplicate) {
                    self.$result.text("ご入力されたTELまたはメールアドレスは、すでにご登録されております。複数回のご登録はできませんのでご了承ください。");
                } else {
                    self.$result.text("");
                    form.submit();
                }
            });
        },
        ajax : function(){
            var self  = this;
            var $elm  = $('#overlapResult');
            var prams = {
                    'tel1' : $('[name="tel1"]').val(),
                    'tel2' : $('[name="tel2"]').val(),
                    'tel3' : $('[name="tel3"]').val(),
                    'mail' : $('[name="mail"]').val()
                };
            return Form.setJsonData({
                url: self.o.url,
                type: 'post',
                data: prams,
                dataType: "json"
            });
        }
    };
    
    /**
     * 勤務先選択で表示切替
     * @param  {[type]} options      [description]
     * @param  {[type]} opt_callback [description]
     * @return {[type]}              [description]
     */
    Form.officeSelect = function(options, opt_callback) {
        this.defaults   = {
            select        : "#office_select",
            officeElement : "#js_officeArea",
            exclusion     : []
        };
        this.o           = $.extend(this.defaults, options);
        this.$select     = $(this.o.select);
        this.$officeWrap = $(this.o.officeElement);
        this.callback   = opt_callback;
        this.init();
    };
    Form.officeSelect.prototype = {
        init : function() {
            var self = this;
            self.event();
        },
        event : function() {
            var self = this;
            
            // 読込み時実行
            self.showElements(self.$select);
            
            // ラジオボタンイベントでの実行
            self.$select.on('change', function() {
                self.showElements($(this));
            });
        },
        showElements : function(showElm) {
            var self = this;
            var val = showElm.val();
            console.log(val);
            console.log($.inArray(val, self.o.exclusion));
            self.$officeWrap.find('input, select, textarea').attr('disabled', false);
            self.$officeWrap.attr('disabled', false).show();
            
            // 条件を設定
            if (typeof self.callback === "function") {
                val = self.callback(val);
            }
            
            if ($.inArray(val, self.o.exclusion) >= 0) {
                self.$officeWrap.find('input, select, textarea').attr('disabled', true);
                self.$officeWrap.attr('disabled', true).hide();
            }
        }
        
    }
    
    
    
    
    // ビットコイン数量入力制限
    Form.btcInputValidation = function(value) {
        var num = value;
        if ( !num.match(/^[0-9]{1,4}(\.[0-9]{1,8}|.)?$/g) ) {
            return false;
        }
        return true;
    };
    
    /**
     * コイン売買
     * @param  {[type]} options      [description]
     * @param  {[type]} opt_callback [description]
     * @return {[type]}              [description]
     */
    Form.trading = function(options, opt_callback) {
        this.defaults   = { checkUrl:"" };
        this.o          = $.extend(this.defaults, options);
        this.$form      = $('#tradingForm');
        this.$btnWrap   = $('#tradingBtn');
        this.$amountBox = $('#tradeAmount');
        this.amount     = 0;
        this.$hidType   = this.$form.find('input[name=type]');
        this.$hidPrice  = this.$form.find('input[name=price]');
        this.$hidAmount = this.$form.find('input[name=amount]');
        this.ticker     = {};
        this.modal      = null;
        this.referenceJPY = new Form.referenceJPY();
        this.callback   = opt_callback;
        this.init();
    };
    Form.trading.prototype = {
            init : function() {
                var self = this;
                self.event();
            },
            event : function() {
                var self = this;
                
                self.setModal();
                
                // 売買 機能振り分け
                self.$btnWrap.on('click', 'button', function(e) {
                    e.preventDefault();
                    var type  = $(this).attr('data-type');
                    var price = "0";
                    self.amount = self.$amountBox.val();
                    
                    if (self.amount <= 0) {
                        alert("数量を指定してください");
                        return false;
                    }
                    
                    if (type === "1") {
                        price = $("#price-ask").text();
                    } else {
                        price = $("#price-bid").text();
                    }
                    price = Number(price.split(',').join(''));
                    
                    
                    // 残高バリデーション
                    var balanceAjax = self.checkBalance();
                    balanceAjax.done(function(res) {
                        
                        var tickerPrice = Math.floor(new window.BigNumber(price).times(self.amount).toPrecision());
                        
                        
                        switch(type) {
                            case "1":
                                if (res.JPY < tickerPrice) {
                                    alert("JPY残高が足りません");
                                    return false;
                                }
                                break;
                            case "2":
                                if (res.BTC < self.amount) {
                                    alert("BTC残高が足りません");
                                    return false;
                                }
                                break;
                            default:
                                return false;
                                break;
                        }
                        
                        // 売買バリデーション
                        var tradeAjax = self.checkTrade({
                            type: type,
                            price: price,
                            amount: self.amount
                        });
                        tradeAjax.done(function(res) {
                            self.modal.open();
                        })
                        .fail(function() {
                            alert("通信エラーによりデータを取得できませんでした");
                        });
                        
                        return false;
                        
                    })
                    .fail(function() {
                        alert("通信エラーによりデータを取得できませんでした");
                    });
                    
                });
                
                $('#js-tradeBtn').on('click', function(event) {
                    event.preventDefault();
                    self.$form.submit();
                });
                
                // 数量（BTC）の変更機能
                $('#tradingSpinBtn').on('click', 'button', function(e) {
                    e.preventDefault();
                    var result = 0;
                    var plus   = Number($(this).val());
                    if (plus === 0) {
                        // クリアボタンを押した場合
                        self.amount = 0;
                    } else {
                        self.amount = new window.BigNumber(self.amount).plus(plus).toPrecision();
                    }
                    
                    self.$amountBox.val(self.amount);
                    
                    self.referenceJPY.update(self.amount);
                    
                });
                
            },
            setModal : function() {
                var self = this;
                self.modal = new Common.modal();
                self.modal.init({
                    href    : "#modal_trade",
                    top     : 120,
                    closeButton : ".modal_window_close, .modal_window_cancel",
                    openCallback : function () {},
                    callback : function(self, $elm) {
                        var progressBer = '<div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="100"></div>';
                        $('#trade-progressBar').append(progressBer);

                        $('#trade-progressBar').find('.progress-bar').progressbar({
                            done: function() {
                              self.close($elm);
                              $('#trade-progressBar').find('.progress-bar').remove();
                            }
                        });
                    }
                });
                
            },
            checkBalance : function(data){
                var self  = this;
                return $.ajax({
                    url: self.o.balanceUrl,
                    type: 'POST',
                    dataType: 'json',
                    data: data
                });
            },
            checkTrade : function(data){
                var self  = this;
                return $.ajax({
                    url: self.o.checkUrl,
                    type: 'POST',
                    dataType: 'json',
                    data: data
                });
            }
    };
    
    /**
     * 日本円参考価格変更
     * @param  {[type]} options      [description]
     * @param  {[type]} opt_callback [description]
     * @return {[type]}              [description]
     */
    Form.referenceJPY = function(options, opt_callback) {
        this.defaults = { url:"", useAmountBox:true };
        this.o        = $.extend(this.defaults, options);
        this.$amountBox = $('#tradeAmount');
        this.amount     = 0;
        this.callback   = opt_callback;
        this.init();
    };
    Form.referenceJPY.prototype = {
        init : function() {
            var self = this;
            self.$amountBox.val(0);
            $('#tradeReferenceJPY').val(0);
            self.event();
        },
        event : function() {
            var self = this;
            
            
            if (self.o.useAmountBox) {
                self.$amountBox.on('click keyup copy', function(e) {
                    var amountNum = $(this).val();
                    
                    // BTCの入力を小数点第8位までに制限
                    if (amountNum != "") {
                        if (Form.btcInputValidation(amountNum)) {
                            self.amount = amountNum;
                        } else {
                            self.amount = Number(amountNum).toFixed(8);
                            $(this).val(self.amount);
                        }
                    } else {
                        self.amount = 0;
                    }
                    self.update();
                });
            }
            
        },
        // 日本円参考総額変更機能
        update : function(amount){
            var self = this;
            var tickerPrice = 0;
            if (amount !== undefined) {
                self.amount = amount;
            }
            if (!self.o.url) {
                var ask = Number($("#price-ask").text().split(',').join(''));
                var bid = Number($("#price-bid").text().split(',').join(''));
                tickerPrice = (ask + bid) / 2;
                self.calc(tickerPrice);
            } else {
                var ticker = self.checkTicker();
                ticker.done(function(data){
                    tickerPrice = (Number(data.adj_ask) + Number(data.adj_bid)) / 2;
                    self.calc(tickerPrice);
                });
            }
        },
        calc : function(price){
            var self = this;
            var result = 0;
            if (self.amount != "") {
                result = Math.round(new window.BigNumber(price).times(self.amount).toPrecision());
            }
            $('#tradeReferenceJPY').val(result);
        },
        checkTicker : function(data){
            var self = this;
            return $.ajax({
                url: self.o.url,
                type: 'POST',
                dataType: 'json',
                data: data
            });
        }
    };
    
    /**
     * 送金バリデーション
     * @param  {[type]} options      [description]
     * @param  {[type]} opt_callback [description]
     * @return {[type]}              [description]
     */
    Form.sendValidation = function(options, opt_callback) {
        this.defaults   = { };
        this.o          = $.extend(this.defaults, options);
        this.$form      = $('#formSend');
        this.amount     = 0;
        this.fee        = 0.002;
        this.callback   = opt_callback;
        this.init();
    };
    Form.sendValidation.prototype = {
        init : function() {
            var self = this;
            self.event();
        },
        event : function() {
            var self = this;
            
            // 数量変更時機能
            $('#tradeAmount').on('click keyup copy', function(event) {
                event.preventDefault();
                var amount = $(this).val();
                
                if (amount <= 0) {
                    $('#sendCoinMessage > div').html('');
                    $('#sendCoinMessage').hide();
                    return false;
                }
                
                var balanceAjax = self.checkBalance();
                balanceAjax.done(function(res) {
                    var balance = new window.BigNumber(Number(amount)).plus(self.fee).toPrecision();
                    $('#sendCoinMessage > div').html(amount+' BTC を送金します。<br>別途 '+self.fee+' BTC を手数料として頂戴いたします。<br>合計 '+balance+' BTC となります。');
                    $('#sendCoinMessage').show();
                })
                .fail(function() {
                    alert("通信エラーによりデータを取得できませんでした");
                });
                
            });
            
            $('#formSendBtn').on('click', function(e) {
                e.preventDefault();
                
                var balanceAjax = self.checkBalance();
                balanceAjax.done(function(res) {
                    var amount = $('#tradeAmount').val();
                    var balance = new window.BigNumber(Number(res.BTC)).minus(self.fee).toPrecision();
                    if ( 0 >= Number(amount) ) {
                        alert("BTC数量を指定してください");
                        return false;
                    }
                    
                    if ( 0.001 > Number(amount) ) {
                        alert("最低送金額は0.001BTCです");
                        return false;
                    }
                    
                    if ( balance < Number(amount) ) {
                        alert("BTC残高が不足しています");
                        return false;
                    }
                    
                    if (confirm(amount + "BTC を送金します。よろしいですか？")) {
                        self.$form.submit();
                    }
                    
                })
                .fail(function() {
                    alert("通信エラーによりデータを取得できませんでした");
                });
                
            });
            
        },
        checkBalance : function(data){
            var self  = this;
            return $.ajax({
                url: self.o.balanceUrl,
                type: 'POST',
                dataType: 'json',
                data: data
            });
        }
    };
    
    
    /**
     * アドレス編集 削除切替
     * @param  {string} elm 指定要素名
     * @param  {string} url ajaxURL
     */
    Form.editAddress = function(options, opt_callback) {
        this.defaults = {};
        this.o        = $.extend(this.defaults, options);
        this.modal    = null;
        this.callback = opt_callback;
        this.init();
    };
    Form.editAddress.prototype = 
    {
        init : function() {
            this.event();
        },
        event : function(form){
            var self = this;
            self.setModal();
            
            var $modalWrap = $("#modal_editAddress");
            var $name    = $modalWrap.find('input[name="name"]');
            var $address = $modalWrap.find('input[name="address"]');
            var $id      = $modalWrap.find('input[name="id"]');
            var $delete  = $('#js-deleteAddress');
            
            
            $('.modal_editAddress_btn').on('click', function(event) {
                event.preventDefault();
                var $list      = $(this).closest('.js-editAddress-item');
                var label      = $list.find('.addressList-label');
                var address    = $list.find('.addressList-code');
                var id         = $(this).attr('data-itemId');
                var $editArea  = $('.js-editAddress');
                
                $delete.attr({'disabled': false, 'checked':false});
                $name.val(label.text());
                $address.val(address.text());
                $id.val(id);
                
                self.modal.open();
                
            });
            
            
            // アドレス編集 削除切替
            $delete.on('change', function(event) {
                event.preventDefault();
                var flag = $(this).prop('checked');
                var $btn = $('#js-editAddressBtn');
                var $editArea = $('.js-editAddress');
                
                if (flag) {
                    $btn.removeClass('btn-primary').addClass('btn-danger').text('削除する');
                    $name.attr('disabled', true);
                    $address.attr('disabled', true);
                } else {
                    $btn.removeClass('btn-danger').addClass('btn-primary').text('編集する');
                    $name.attr('disabled', false);
                    $address.attr('disabled', false);
                }
                
            });
        },
        setModal : function() {
            var self = this;
            self.modal = new Common.modal();
            self.modal.init({
                // element : ".modal_trade_btn",
                href    : "#modal_editAddress",
                top     : 120,
                closeButton : ".modal_window_close, .modal_window_cancel",
                openCallback : function () {},
                callback : function(self, $elm) {
                    
                }
            });
            
        }
    };

    /**
     * 本人確認書類アップロード項目追加
     * @param {[type]} options      [description]
     * @param {[type]} opt_callback [description]
     */
    Form.addFileInpts = function(options, opt_callback) {
        this.defaults = { addBtn:"#addFileinputBtn" };
        this.o        = $.extend(this.defaults, options);
        this.$addBtn  = $(this.o.addBtn);
        this.callback = opt_callback;
        this.init();
    };
    Form.addFileInpts.prototype = 
    {
        init : function() {
            var self = this;
            var img_length = $('.imgFileBox').length;
            if (img_length >= 10) {
                self.$addBtn.hide();
            }
            
            this.event();
        },
        event : function(form){
            var self = this;
            self.$addBtn.on('click', function(event) {
                event.preventDefault();
                var $wrap = $('#documentUpload');
                var img_length = $('.imgFileBox').length;
                var id = $wrap.find('.addFileBox').length + 1;
                
                var html =  '<div class="form-group imgFileBox addFileBox">' +
                            '<label class="col-md-3 col-sm-3 control-label">本人確認書類</label>' +
                            '<div class="col-md-3"><label class="label-file" for="file'+id+'">画像を選択する<input type="file" class="form-control input" name="file'+id+'" id="file'+id+'"></label></div>' +
                            '<div class="col-md-6 col-sm-6 documentUpload-box">' +
                            '<div class="documentUpload-preview"></div>' +
                            '</div></div>';
                $wrap.append(html);
                $( "#file" + id ).rules( "add", {
                    // required: true ,
                    accept: "image/jpg,image/jpeg,image/png",
                    filesize: self.o.size_image,
                    messages: {
                        accept: "png,jpg形式で画像をアップロードしてください",
                        filesize: 'アップロードする画像は10M以内でお願い致します'
                    }
                });
                
                if ((img_length + 1) >= 10) {
                    $(this).hide();
                }
            });
        }
    };

    /**
     * チェックボックスで表示を切替える
     * @param  {element}   elm              ラジオボタンをwpapしている要素
     * @param  {string}    opt_changeClass  切替える要素のclass指定
     * @param  {string}    opt_mode         表示切替タイプ single（チェックボックス1つ） or multiple（チェックボックス複数）
     * @param  {function}  opt_conditions   条件を設定
     */
    Form.changeCheckboxElement = function(elm, opt_changeClass, opt_mode, opt_conditions){
        var self = this,
            $blocks = (opt_changeClass) ? $(opt_changeClass) : $('.js_checkboxBlock');
        
        // 読込み時実行
        $blocks.hide();
        showElements($(elm));
        
        // ラジオボタンイベントでの実行
        $(elm).on('change', 'input', function() {
            showElements($(elm));
        });
        
        function showElements($parent) {
            var val;
            
            // 初期化
            $blocks.find('input, select, textarea').attr('disabled', true);
            $blocks.attr('disabled', true).hide();
            
            if ( opt_mode == "single" ) {
                if ($parent.find('input[type=checkbox]').prop('checked')) {
                    val = 1;
                } else {
                    val = 0;
                }
                $blocks.eq(val).find('input, select, textarea').attr('disabled', false);
                $blocks.eq(val).attr('disabled', false).show();
            }
            
            if ( opt_mode == "multiple" ) {
                $parent.find('input').each(function(index, el) {
                    if ($(this).prop('checked')) {
                        val = $(this).val();
                        $blocks.eq(val).find('input, select, textarea').attr('disabled', false);
                        $blocks.eq(val).attr('disabled', false).show();
                    }
                    
                    // 条件を設定
                    if (typeof opt_conditions === "function") {
                        val = opt_conditions(val);
                    }
                });
            }
        }
    };
    
    // private method
    // ---------------------------------------------------------- //
    
    
    // プラグインの有無確認
    function pluginExists( pluginName ){
        return [pluginName] || $.fn[pluginName] ? true : false;
    }
    
    // 0追加
    function affixZero(int) {
        if (int < 10) int = "0" + int;
        return "" + int;
    }
    
    // 金額カンマ付け
    function money_format(num){
        return String(num).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
    }
    
    // NaN判定
    function valueIsNaN(v) {
        return v !== v;
    }
    
    // デバック用
    function assert(condition, opt_message) {
        if (!condition) {
            if (window.console) {
                // メッセージの表示
                console.log('Assertion Failure');
                if (opt_message) console.log('Message: ' + opt_message);
                // スタックトレースの表示
                if (console.trace) console.trace();
                if (Error().stack) console.log(Error().stack);
            }
            // デバッガーを起動し、ブレークする
            debugger;
        }
    }
    
    return App;
    
})(jQuery, window, document);

$(function(window){
    window.app = new App.Main('./');
    window.appForm = new App.Form();
}(window));
