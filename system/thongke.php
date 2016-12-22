<?
if (!defined('BMN2312')) die ('The request not found');
?>

<div class="col-lg-12 col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Thành Viên Mới</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive project-stats">  
                                       <table class="table">
                                           <thead>
                                               <tr>
                                                   <th>#</th>
                                                   <th>Họ và Tên</th>
                                                   <th>Chức Vụ</th>
                                                   <th>ID Facebook</th>
                                                   <th>Tình Trạng</th>
                                               </tr>
                                           </thead>
                                           <tbody>
										   <?php
	$infotv = @mysqli_query($connection,"SELECT * FROM `Users` order by id desc LIMIT 0,6");
	 while ($getinfo = @mysqli_fetch_array($infotv)){
		$nametv= $getinfo['name'];
		$idtv= $getinfo['idfb'];
		?>
                                               <tr>
                                                   <th scope="row"><img width="20" height="20" src="https://graph.facebook.com/<?php echo $idtv; ?>/picture?type=large" alt="Bot like" class="img-circle"></th>
                                                   <td><a href="https://facebook.com/<?php echo $idtv; ?>" target="_blank"><?php echo $nametv; ?></a></td>
                                                   <td><span class="label label-success"><?php if($getinfo['idfb']=='100013711958261') {echo 'Admin';}else{echo 'Member';}?></span></td>
                                                   <td><?php echo $idtv; ?></td>
                                                   <td><span class="label label-success">Active</span></div>
                                                   </td>
                                               </tr>
											   <?php } ?>	
                                           </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Main Wrapper -->