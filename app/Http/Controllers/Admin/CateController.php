<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Model\CateModel;

    class CateController extends Controller
    {
        public function add()
        {
            // echo "qqq";
            $data = CateModel::get();

            return view("admin.cate.add",['data'=>$data]);
            

        }

        public function add_do(Request $request)
        {
            // echo "qqq";
            $res = request()->all();
            // dd($res);
            $data = CateModel::insert([
                "cate_name"=>$res['cate_name'],
                "parent_id"=>$res['parent_id'],
                "cate_show"=>$res['cate_show'],
                "cate_nav_show"=>$res['cate_nav_show'],
                "add_time"=>time(),
            ]);
            // dd($data);
            if ($data){ 
                echo "<script>alert('添加成功');location.href='/cate/index';</script>"; 
            }else{ 
                echo "<script>alert('添加失败');location.href='/cate/add';</script>"; 
            } 

        }

        public function index()
        {
            // echo "qqq";
            //查询数据库
            $data = CateModel::paginate(3);
            $da = CateModel::get();
            //dd($data);
            //渲染视图
            return view("admin.cate.index",['data'=>$data,'da'=>$da]);
        
        }

        public function del($cate_id)
        {
            // echo 123;
            $res = CateModel::where(['cate_id'=>$cate_id])->delete();
            // dd($res);
            if ($res){ 
                echo "<script>alert('删除成功');location.href='/cate/index';</script>"; 
            }else{ 
                echo "<script>alert('删除失败');location.href='/cate/index';</script>"; 
            } 
        }
    }