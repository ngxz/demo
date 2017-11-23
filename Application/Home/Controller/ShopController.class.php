<?php
namespace Home\Controller;
use Home\Controller\PublicController;
/**
 * 商品列表，增改等
 * @author Administrator
 *
 */
class ShopController extends PublicController{
    public function _ininialize(){
        parent::_ininialize();
    }
    /**
     * 商品列表
     */
    public function shoppinglist(){
        $mod = M("goods");
        //总数目
        $total = $mod->where("isshow = 1")->count();
        $page = getpage($total,5);
        $show = $page->show();//显示分页
        
        $lists = $mod->where("isshow = 1")->limit($page->firstRow.','.$page->listRows)->order("add_time desc")->select();
        $this->assign("lists",$lists);
        $this->assign('page',$show);
        $this->display();
    }
    /**
     * 上传图片
     */
    public function uploadpic(){
        //图片
        if (isset($_FILES['pic'])){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            $upload->saveName  = time().mt_rand();
            // 上传文件
            $info   =   $upload->upload($_FILES);
            //路径
            $img_url = '/Uploads/'.$info['pic']['savepath'].$info['pic']['savename'];
            $img_url2 = './Public/Uploads/'.$info['pic']['savepath'].'thumb_'.$info['pic']['savename'];
            //                 print_r($img_url2);exit();
        
            $image = new \Think\Image();
            $image->open("./Public/".$img_url);
            // 按照原图的比例生成一个缩略图并保存
            $image->thumb(100, 100)->save($img_url2);
            $this->ajaxReturn(array('status'=>$info,'img_url'=>$img_url,'msg'=>($info ?'上传成功':'上传失败')));
            //                   $this->ajaxReturn(array('status'=>$info,'msg'=>($info ? '上传成功':$upload->getError())));
        }
    }
    /**
     * 添加
     */
    public function add(){
        if (IS_POST){
            //资料
            $data['code'] = I("code");
            $data['name'] = I("name");
            $data['price'] = I("price");
            $data['category'] = I("category");
            $zhengce = implode(",", I("zhengce"));
            $data['zhengce'] = $zhengce;
            $data['note'] = I("note");
            $data['info'] = I("info");
            $data['img_url'] = I("img_url");
            $data['add_time'] = time();
            
//             print_r($data);exit();
            $res = M("goods")->field("code,name,price,category,zhengce,note,info,img_url,add_time")->add($data);
            $this->ajaxReturn(array('status'=>$res,'msg'=>($res?'提交成功！':'提交失败！')));
        }
        $this->display();
    }
    /**
     * 修改方法
     * @param string $id
     */
    public function edit($id=''){
        if (!$id){
            $this->error("请选择一个商品操作");
        }
        //修改
        if (IS_POST){
            $data['code'] = I("code");
            $data['name'] = I("name");
            $data['price'] = I("price");
            $data['category'] = I("category");
            $zhengce = implode(",", I("zhengce"));
            $data['zhengce'] = $zhengce;
            $data['note'] = I("note");
            $data['info'] = I("info");
            $data['img_url'] = I("img_url");
            $data['add_time'] = time();
//             print_r($data);exit();
            $res = M("goods")->where("id = '$id'")->save($data);
            $this->ajaxReturn(array('status'=>$res,'msg'=>($res?'修改成功！':'修改失败！')));
        }
        //回填
        $goods = M("goods")->where("id = '$id'")->find();
        $this->assign('goods',$goods);
        $this->display();
    }
    /**
     * 删除
     * @param string $id
     */
    public function del($id=''){
        if (!$id){
            $this->error("请选择一个商品操作");
        }
        $data['isshow'] = 0;
        $res = M("goods")->where("id = '$id'")->field("isshow")->save($data);
        $this->ajaxReturn(array('status'=>$res,'msg'=>($res?'删除成功！':'删除失败！')));
    }
}

?>