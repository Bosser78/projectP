<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;

use Illuminate\Support\Facades\Session;
use Illuminate\support\Facades\Crypt;
use App\Models\User;
use App\Models\medis;
use App\Models\sales;
use Illuminate\Support\Facades\DB;
use PDF;

class Authcontroller extends Controller
{
    public function registration()
    {
        return view('auth.registration');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:12'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Hash the password


        if ($user->save()) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
    public function login()
    {
        // return "Login";
        return view('auth.login');
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                if ($user->role == 'admin') {
                    $request->session()->put('userRole', 'admin');
                } else {
                    $request->session()->put('userRole', 'user');
                }
                return redirect('about');
            } else {
                return back()->with('fail', 'Password not matches.');
            }
        } else {
            return back()->with('fail', 'This email is not registered.');
        }
    }
    public function dashboard()
    {
        // $member = medis::latest()->paginate(1);
        // $medis= medis::all();
        $medis = medis::paginate(8); // 10 คือจำนวนรายการที่ต้องการแสดงในแต่ละหน้า
        $member = medis::paginate(8);
        //    return "Welcome!! To you dashboard";
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view('about', compact('data', 'medis', 'member'));
    }
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('about');
        }
    }


    public function viewcart(Request $request)
    {
        $nameuser = Session::get('loginId');

        $results = DB::table('sales')
            ->leftJoin('users', 'sales.iduser', '=', 'users.id')
            ->join('medis', 'sales.idmedis', '=', 'medis.id')
            ->select('users.name as customer_name', 'medis.name as product_name', 'medis.price as price_sale', 'sales.id as medis_id')
            ->where('users.id', '=', $nameuser)
            ->where('sales.role', '=', 'wait')
            ->get();

        // return view('your_view', ['results' => $results]);

        // foreach ($results as $result) {
        //     $request->session()->put('cartadds', [
        //         'idsale' => $result->medis_id,
        //         'customer_name' => $result->customer_name,
        //         'product_name' => $result->product_name,
        //         'price_sale' => $result->price_sale,
        //     ]);
        // }
        // SELECT users.name as customer_name, medis.name as product_name
        // FROM sales
        // LEFT JOIN users ON sales.iduser = users.id
        // JOIN medis ON sales.idmedis = medis.id;
        $data = null;
        $cartall = sales::all();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view('cart',compact('data','results','cartall')
        );
    }

    public function historyuser(Request $request){
        $nameuser = Session::get('loginId');

        $results = DB::table('sales')
            ->leftJoin('users', 'sales.iduser', '=', 'users.id')
            ->join('medis', 'sales.idmedis', '=', 'medis.id')
            ->select('users.name as customer_name', 'medis.name as product_name', 'medis.price as price_sale', 'sales.id as medis_id')
            ->where('users.id', '=', $nameuser)
            ->where('sales.role', '=', 'success')
            ->get();



        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view('history', compact('results','data'));

    }

    public function carts(Request $request )
    {
        $user = new sales();
        $user->iduser =$request->iduser;
        $user->idmedis = $request->id ;

        $user->save();


        return redirect()->back()->with('success', 'Book has been added to cart!');
        // return $request->iduser;
    }
    public function dascart(){
        $medics = sales::all();

    }
    public function bill(Request $request){
        $nameuser = Session::get('loginId');
        $results = DB::table('sales')
            ->leftJoin('users', 'sales.iduser', '=', 'users.id')
            ->join('medis', 'sales.idmedis', '=', 'medis.id')
            ->select('users.name as customer_name', 'medis.name as product_name', 'medis.price as price_sale', 'sales.id as medis_id')
            ->where('users.id', '=', $nameuser)
            ->where('sales.role', '=', 'wait')
            ->get();

        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $member = sales::latest()->paginate(15);
        if ($request->has('download')) {
            $pdf = PDF::loadView('billpdf', compact('results'))->setOptions(['defaultFont' => 'THSarabun']);




            if ($results->isNotEmpty()) {
                // Assuming you want to return an array of medis_ids
                $medisIds = $results->pluck('medis_id')->toArray();


                sales::whereIn('id', $medisIds)->update(['role' => 'success']);






                return $pdf->download('pdfview.pdf')->header('Refresh', '3;url=' . url('/about'));

        }

 }

        // return $id;




        return view('bill', compact('data','results'));


}







    public function postbill( Request $request){
        // $nameuser = Session::get('loginId');
        // $results = DB::table('sales')
        //     ->leftJoin('users', 'sales.iduser', '=', 'users.id')
        //     ->join('medis', 'sales.idmedis', '=', 'medis.id')
        //     ->select('users.name as customer_name', 'medis.name as product_name', 'medis.price as price_sale', 'sales.id as medis_id')
        //     ->where('users.id', '=', $nameuser)
        //     ->where('sales.role', '=', 'wait')
        //     ->get();


        // if ($results->isNotEmpty()) {
        //     // Assuming you want to return an array of medis_ids
        //     $medisIds = $results->pluck('medis_id')->toArray();


        //     sales::whereIn('id', $medisIds)->update(['role' => 'success']);

            // return $medisIds;
        // $medisId = $request->input('medis_id');
//         $sales = sales::where('id', $medisIds);
//         $sales->update(['role' => 'success']);

        // return $results->medis_id;
//   return $medisIds;
        // return redirect()->back()->with('success', 'Checkout successful!');
    }



    public function chartgoogle(){

        // ดึงข้อมูลจากฐานข้อมูล
        $result = DB::select('SELECT medis.name AS product_name,COUNT(*) AS count_per_group FROM sales INNER JOIN medis ON sales.idmedis = medis.id GROUP BY sales.idmedis, medis.name;');

        // กำหนดรูปแบบตัวแปรที่จะเก็บข้อมูล
        $answer = [['Medis ID', 'Count Per Group']];

        // นำข้อมูลที่ได้มาวนลูปและเพิ่มลงในตัวแปร $answer
        foreach ($result as $row) {
            $answer[] = [(string)$row->product_name, (int)$row->count_per_group];
        }

        // ตอนนี้ $answer จะมีรูปแบบเดียวกับตัวอย่างที่ให้มา

        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view('chartgoogle',compact('answer','data'));
    }

}
