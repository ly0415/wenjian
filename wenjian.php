

1、
<input type="hidden" name="s" value="/<?= $request->pathinfo() ?>">
s 是当前访问的控制器方法（http://www.phpstudy.net/index.php?s=%2Fstore%2Fstore.source_list%2Findex.html&sourcename=）
                        http://www.phpstudy.net/index.php?s=/store/store.source_list/index.html
<input type="text" class="am-form-field" name="sourcename" placeholder="请输入来源名称" value="<?= $request->get('sourcename') ?>">

get方法访问s中的访问方法  带入参数get('sourcename')




<?php //if (isset($roionList['url'])):  ?>
<!--    <a  href="--><?//= $roionList['url']?><!--">小程序地址:</a>-->
<!---->
<!--    <input type="hidden" name="rotionc[url]" value="--><?//= $roionList['url'] ?><!--">-->
<?php //endif;  ?>
<!---->
<!---->
<!--[{"img":"20190905\/2019090513341799d8f0671.jpg","url":"sdadad1111111dad\/sdad"}]-->


2、tp5 中AJAX用法

<td class="am-text-middle">
    <div class="tpl-table-black-operation">
        <a href="javascript:;" class="<?php if( checkPrivilege('distribution.discount_change/edit')):?>j-state<?php endif;?>" data-id="<?= $item['id'] ?>" data-state="">
            <i class="am-icon-pencil"></i>审核
        </a>
<script>
    // 审核状态
    $('.j-state').click(function () {
        var data = $(this).data();
        layer.confirm('确定要审核通过么？', {
            btn: ['通过', '拒绝'] //按钮
        }, function () {
            $.ajax({
                type: 'get',
                url: "<?= url('distribution.discount_change/edit') ?>",
                data:{id:data.id,status:2},
                dataType: 'json',
                success: function (res) {
                    if (res.code) {
                        layer.msg(res.msg, {icon: 1, time: 2000});
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000)
                    } else {
                        layer.msg(res.msg, {icon: 5})
                    }
                }
            })
        }, function () { $.ajax({
            type: 'get',
            url: "<?= url('distribution.discount_change/edit') ?>",
            data:{id:data.id,status:3},
            dataType: 'json',
            success: function (res) {
                if (res.code) {
                    layer.msg(res.msg, {icon: 1, time: 2000});
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000)
                } else {
                    layer.msg(res.msg, {icon: 5})
                }
            }
        })
        });
    });

    3、tp5 each 函数
    这篇文章介绍的内容是关于TP5-分页类中的each函数 ，有着一定的参考价值，现在分享给大家，有需要的朋友可以参考一下
    $list = Db::name('merchant_order_detail')->alias('a')->join('merchant_order b', 'b.id = a.order_id')->where($whereStr)->field($file)->order($order)->paginate(Config::get('list_rows'), false, ['page' => $page,'query'=>$param])->each(function($item, $key){

        $item['loglist'] = Db::name('merchant_order_detail_log')->where("order_detail_id=".$item['id']." and amount>0")->field('order_sn')->select();            return $item;

    });
    $list = Db::name('merchant_order')->alias('a')

        ->join('merchant_member mm', 'mm.id=a.member_id', 'LEFT')

        ->where($whereStr)

        ->field($file)

        ->order(['a.create_time' => 'desc'])

    ->paginate(Config::get('list_rows'), false, ['page' => $page,'query'=>$param])

    ->each(function($item,$key){                    if($item['pid'] == 0) {

        $item['company_name'] = Db::name('merchant')->where(['member_id'=>$item['member_id']])->value('company_name');

        $item['sub_company_name'] = Db::name('merchant')->where(['member_id'=>$item['member_id']])->value('sub_company_name');

        $item['corporation'] = Db::name('merchant')->where(['member_id'=>$item['member_id']])->value('corporation');

    } else {

        $item['company_name'] = Db::name('merchant')->where(['member_id'=>$item['pid']])->value('company_name');

        $item['sub_company_name'] = Db::name('merchant')->where(['member_id'=>$item['pid']])->value('sub_company_name');

        $item['corporation'] = Db::name('merchant')->where(['member_id'=>$item['pid']])->value('corporation');

    }                    return $item;

    });


    $merchant_member_list = Db::name('merchant_member')->alias('mm')

        ->join('merchant m', 'm.member_id = mm.id', 'LEFT')

        ->join('merchant_type mt', 'm.merchant_type_id = mt.id', 'LEFT')

        ->where($where)

        ->field($field)

        ->order(['mm.is_lock' => 'asc','mm.create_time' => 'desc'])

    ->paginate(Config::get('list_rows'), false, ['page' => $page, 'query' => $param])

    ->each(function($item, $key){                                    if($item['mt_pid']=='0'){

        $item['cate'] = '一级';

    } else {

        $item['cate'] = Db::name('merchant_type')->where("id=".$item['mt_pid'])->value('name');

    }                                    return $item;

    });





























qqqqqqqqqqqqqqqqqqqqqqqqq

    //        $user_id=1053;
    //        $order_sn='201910121612298324';
    //        $store_id=98;
    //        $evaluete_content="阿萨德卡军阿大萨大大阿萨德卡军阿大萨大大阿萨德卡军阿大萨大大阿萨德卡军阿大萨大大阿萨德卡军阿大 .萨大大阿萨德卡军阿大萨大大阿萨德卡军阿大萨大大阿萨德卡军阿大萨大大阿萨德卡军阿大萨大大阿萨德卡军阿大萨大大";
    //        $goods_images=['1111111111111111111.jpg','2222222222222.jpg','333333333.jpg'];
    //        $star_num=[1,2,3];



    //        $userid=34317;
    //        $data['headimgurl']='sdadad';
    //        $data['username']='达到第三色图分身乏术';
    //        $data['phone']='18612844870';
    //        $data['email']='16822222465@qq.com';
    //        $data['sex']=2;
    //        $data['birth']='2018-15-12';