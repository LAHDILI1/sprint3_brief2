<?php
namespace App\Controllers\admin;

use App\Models\Users;
require_once '../../../vendor/autoload.php';

class UserController{
    private $objetUser;

    public function __construct(){
        $this -> objetUser = new Users();
    }

    public function show_user(){
        $user = $this -> objetUser->get_users();

        while($row = $user->fetch()){
        
                   
                        // echo'<tr>'
                        //     .'<td>'. $row['id'] .'</td>'
                        //     .'<td>'.$row['first_name'].'</td>'
                        //     .'<td>'.$row['last_name'].'</td>'
                        //     .'<td>'.$row['email'].'</td>'
                        //     .'<td>'.$row['phone'].'</td>'
                        //     .'<td>'.$row['name'].'</td>'

                            
                        //     .'<td>'
                        //     .'<a href="" onclick="return confirm ('.'do you really to remove this user'.');">'.'<button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-pencil"></span>'.'Delete'.'</button>'.'</a>'
                               
                        //        . '<button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-trash"></span>Edit</button>'
                        //     .'</td>'
                        // .'</tr>';

                        
                        echo '<tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['first_name'] . '</td>
                                <td>' . $row['last_name'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['phone'] . '</td>
                                <td>' . $row['name'] . '</td>

                                <td>
                                    <a href="../../../App/Controllers/admin/Delete.php?UserId = $row[\'id\']" onclick="return confirm(\'Do you really want to remove this user?\');">
                                        <button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                                    </a>
                                    <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span>Edit</button>
                                </td>
                            </tr>';

                        
        }
    }
    
}

?>

