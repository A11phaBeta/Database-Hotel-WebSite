<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CDS 호텔 관리자 페이지</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">CDS 호텔 관리자 페이지</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
            <!-- Navbar-->
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="manage_user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                고객관리
                            </a>
                            <a class="nav-link" href="manage_staff.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                스태프관리
                            </a>

                            <a class="nav-link" href="manage_jaego.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                재고관리
                            </a>
                            
                            
                            
                           
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        DCS 호텔 관리자 페이지
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                고객 리스트
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <colgroup>
                                            <col style="width:10%">
                                            <col style="width:*">
                                            <col style="width:*">
                                            <col style="width:*">
                                            <col style="width:*">
                                            <col style="width:*">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>번호</th>
                                                <th>성명</th>
                                                <th>연락처</th>
                                                <th>이메일</th>
                                                <th>가입일</th>
                                                <th>회원구분</th>
                                                <th>처리</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                                <th>번호</th>
                                                <th>성명</th>
                                                <th>연락처</th>
                                                <th>이메일</th>
                                                <th>가입일</th>
                                                <th>회원구분</th>
                                                <th>처리</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                            <?php
                                            
                                            require_once('../../../../apis/modules/user.php');
                              
                                            $jsonObj = json_decode(getUserInfo2(), true);
                              
                                            if(count($jsonObj) == 0){
                              
                                            }else{
                                              for($i=0;$i<count($jsonObj);$i++){
                                                echo "<tr>
                                        
                                                <td>".$jsonObj[$i]['user_id']."</td>
                                                <td>".$jsonObj[$i]['user_name']."</td>
                                                <td>".$jsonObj[$i]['contact']."</td>
                                                <td>".$jsonObj[$i]['email']."</td>
                                                <td>".$jsonObj[$i]['timestamp']."</td>
                                                <td>".(($jsonObj[$i]['type_id'] == 0) ? "회원" : "비회원")."
                                                <td><a href='../../../../apis/apiControl.php?delUser&userID=".$jsonObj[$i]['user_id']."'>삭제</a></tr>";
                                              }
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
