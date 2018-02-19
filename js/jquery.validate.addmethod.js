// カスタムルールを定義します($.validator.addMethod(項目名, 検証ルール)で設定します)。
var methods = {
    // 年齢チェック
    check_age: function(value, element, param){
        var age = parseInt($('#ageNum').text());
        return this.optional(element) || (age < param) ? false : true;
    },
    // 記号を排除
    check_string: function(value, element){
        return this.optional(element) || /^[^\",]+$/.test( value );
    },
    // 記号を排除(「-」「/」は許可)
    check_symbol: function(value, element){
        return this.optional(element) || /^[^!-,\.:-@\[-`\{-\~！＂＃＄％＆＇（）＊＋，．：；＜＝＞？＠［＼］＾＿｀｛｜｝～]+$/.test( value );
    },
    // カタカナチェック
    check_kana: function(value, element){
        return this.optional(element) || /^[ァ-ヶー 　]+$/.test( value );
    },
    // 半角数字カタカナチェック
    check_num_kana: function(value, element){
        return this.optional(element) || /^[0-9ァ-ヶｦ-ﾟ\-ｰー\/ 　]+$/.test( value );
    },
    // 英字カタカナチェック
    check_kana_en: function(value, element){
        return this.optional(element) || /^[ァ-ヶｦ-ﾟa-zA-Z\-ｰー\/ 　]+$/.test( value );
    },
    // 口座名義カタカナチェック
    check_bank_kana: function(value, element){
        return this.optional(element) || /^[ァ-ヶｦ-ﾟ\-ｰー\/ 　]+$/.test( value );
    },
    // 全角文字チェック
    check_fullwide: function(value, element){
        return this.optional(element) || /^[^ -~｡-ﾟ\x00-\x1f\t]+$/.test( value );
    },
    // メール用チェック
    check_mail: function(value, element){
        return this.optional( element ) || /^([a-z0-9])([a-z0-9!#$%*+=?^{}._\-'\/()]+)([a-z0-9\-_()])@([a-z0-9])([a-z0-9!#$%*+=?^{}._\-'\/]+)(\.[a-z]+)$/.test( value );
    },
    // 大文字英字チェック
    upper_en: function(value, element){
        return this.optional(element) || /^[A-Z ]+$/.test(value);
    },
    // 年齢チェック
    least_one: function(value, element, param){
        var target = $( param + ":checked" );
        console.log(target.length);
        return this.optional(element) || (target.length > 0) ? true : false;
    },
    // 収益移転防止法チェック
    check_agree: function(value, element, param){
        return this.optional(element) || (value == 1) ? true : false;
    }
};
$.each(methods, function(key){
    $.validator.addMethod(key, this);
});

$.validator.addMethod( "require_from_group", function( value, element, options ) {
    var $fields = $( options[ 1 ], element.form ),
        $fieldsFirst = $fields.eq( 0 ),
        validator = $fieldsFirst.data( "valid_req_grp" ) ? $fieldsFirst.data( "valid_req_grp" ) : $.extend( {}, this ),
        isValid = $fields.filter( function() {
            return validator.elementValue( this );
        } ).length >= options[ 0 ];

    // Store the cloned validator for future validation
    $fieldsFirst.data( "valid_req_grp", validator );

    // If element isn't being validated, run each require_from_group field's validation rules
    if ( !$( element ).data( "being_validated" ) ) {
        $fields.data( "being_validated", true );
        $fields.each( function() {
            validator.element( this );
        } );
        $fields.data( "being_validated", false );
    }
    return isValid;
}, $.validator.format( "少なくとも{0}個は入力してください" ) );