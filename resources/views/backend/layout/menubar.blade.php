<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>{{ Auth::user()->name }} </b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{route('dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>





            <li class="treeview">
                <a href="">
                    <i data-feather="message-circle"></i>
                    <span>Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>

                @php
                $name = Route::currentRouteName();

                @endphp
                <ul class="treeview-menu">
                    <li class="{{ Route::currentRouteName() == 'user.profile' ? 'active' : '' }}"><a
                            href="{{ route('user.profile') }}"><i class="ti-more"></i>User Profile</a></li>
                    <li class="{{ Route::currentRouteName() == 'user.edit' ? 'active' : '' }}"><a
                            href="{{ route('user.edit') }}"><i class="ti-more"></i>Update Profile</a></li>
                    <li class="{{ Route::currentRouteName() == 'user.edit.password' ? 'active' : '' }}"><a
                            href="{{ route('user.edit.password') }}"><i class="ti-more"></i>Change Password</a>
                    </li>
                    <li><a href="{{ route('user.logout') }}"><i class="ti-more"></i>Logout</a></li>
                </ul>
            </li>

            @if (Auth::user()->role=='admin')

            <li class="treeview">
                <a href="#">
                    <i data-feather="users"></i> <span>User Manageer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Route::currentRouteName() == 'add.user' ? 'active' : '' }}"><a
                            href="{{ route('add.user') }}"><i class="ti-more"></i>Add User</a></li>
                    <li class="{{ Route::currentRouteName() == 'user.list' ? 'active' : '' }}"><a
                            href="{{ route('user.list') }}"><i class="ti-more"></i>User List </a></li>

                </ul>
            </li>

            @endif

            <li class="treeview">
                <a href="#">
                    <i data-feather="settings"></i>
                    <span>Setup Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Route::currentRouteName() == 'view.class' ? 'active' : '' }}"><a
                            href="{{ route('view.class') }}"><i class="ti-more"></i>Class</a></li>


                    <li class="{{ Route::currentRouteName() == 'view.group' ? 'active' : '' }}"><a
                            href="{{ route('view.group') }}"><i class="ti-more"></i>Group</a></li>


                    <li class="{{ Route::currentRouteName() == 'view.year' ? 'active' : '' }}"><a
                            href="{{ route('view.year') }}"><i class="ti-more"></i>Year</a></li>

                    <li class="{{ Route::currentRouteName() == 'exam.index' ? 'active' : '' }}"><a
                            href="{{ route('exam.index') }}"><i class="ti-more"></i>Exam</a></li>

                    <li class="{{ Route::currentRouteName() == 'shift.index' ? 'active' : '' }}"><a
                            href="{{ route('shift.index') }}"><i class="ti-more"></i>Shift</a></li>

                    <li class="{{ Route::currentRouteName() == 'feecata.index' ? 'active' : '' }}"><a
                            href="{{ route('feecata.index') }}"><i class="ti-more"></i>Fee
                            Catagory</a></li>

                    <li class="{{ Route::currentRouteName() == 'feeamount.index' ? 'active' : '' }}"><a
                            href="{{ route('feeamount.index') }}"><i class="ti-more"></i>Fee
                            Catagory Ammount</a></li>

                    <li class="{{ Route::currentRouteName() == 'subject.index' ? 'active' : '' }}"><a
                            href="{{ route('subject.index') }}"><i class="ti-more"></i>Subject</a></li>

                    <li class="{{ Route::currentRouteName() == 'designation.index' ? 'active' : '' }}"><a
                            href="{{ route('designation.index') }}"><i class="ti-more"></i>Designation</a>
                    </li>
                </ul>




            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="book-open"></i>
                    <span>Student Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Route::currentRouteName() == 'student.index' ? 'active' : '' }}"><a
                            href="{{ route('student.index') }}"><i class="ti-more"></i>Student List</a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'student.create' ? 'active' : '' }}"><a
                            href="{{ route('student.create') }}"><i class="ti-more"></i>Student Registration</a>
                    </li>



                </ul>




            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="briefcase"></i>
                    <span>Employee Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Route::currentRouteName() == 'view.employee' ? 'active' : '' }}"><a
                            href="{{ route('view.employee') }}"><i class="ti-more"></i>Employee List</a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'employee.salary.view' ? 'active' : '' }}"><a
                            href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'employee.leave.view' ? 'active' : '' }}"><a
                            href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'employee.attendence.view' ? 'active' : '' }}"><a
                            href="{{ route('employee.attendence.view') }}"><i class="ti-more"></i>Employee
                            Attendence</a>
                    </li>





                </ul>




            </li>


            <li class="treeview">
                <a href="#">
                    <i data-feather="box"></i>
                    <span>Marks Managment</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ Route::currentRouteName() == 'marks.entry' ? 'active' : '' }}"><a
                            href="{{ route('marks.entry') }}"><i class="ti-more"></i>Marks Entry</a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'marks.edit' ? 'active' : '' }}"><a
                            href="{{ route('marks.edit') }}"><i class="ti-more"></i>Marks Edit</a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'grade.view' ? 'active' : '' }}"><a
                            href="{{ route('grade.view') }}"><i class="ti-more"></i>Grade System</a>
                    </li>







                </ul>




            </li>
            {{-- End Marks Management --}}


            <li class="treeview">
                <a href="#">
                    <i data-feather="command"></i>
                    <span>Accounts Managment</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ Route::currentRouteName() == 'student.fees.view' ? 'active' : '' }}"><a
                            href="{{ route('student.fees.view') }}"><i class="ti-more"></i>Student Fee</a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'student.fees.edit' ? 'active' : '' }}"><a
                            href="{{ route('student.fees.edit') }}"><i class="ti-more"></i>Student Fee Edit</a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'employees.payment.view' ? 'active' : '' }}"><a
                            href="{{ route('employees.payment.view') }}"><i class="ti-more"></i>Employee Payment</a>
                    </li>


                    <li class="{{ Route::currentRouteName() == 'othercost.view' ? 'active' : '' }}"><a
                            href="{{ route('othercost.view') }}"><i class="ti-more"></i>Other Cost</a>
                    </li>









                </ul>




            </li>

            {{-- End Account Management --}}

            <li class="treeview">
                <a href="#">
                    <i data-feather="pie-chart"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ Route::currentRouteName() == 'profit.view' ? 'active' : '' }}"><a
                            href="{{ route('profit.view') }}"><i class="ti-more"></i>Monthly Profit/Loss</a>
                    </li>

                     <li class="{{ Route::currentRouteName() == 'attendence.report.employee' ? 'active' : '' }}"><a
                            href="{{ route('attendence.report.employee') }}"><i class="ti-more"></i>Monthly Attendence</a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'exam.report.view' ? 'active' : '' }}"><a
                        href="{{ route('exam.report.view') }}"><i class="ti-more"></i>Exam Report</a>
                </li>



                </ul>




            </li>

            {{-- Markshee Manager  --}}


            <li class="treeview">
                <a href="#">
                    <i data-feather="smile"></i>
                    <span>MarkSheet</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ Route::currentRouteName() == 'marksheet.view' ? 'active' : '' }}"><a
                            href="{{ route('marksheet.view') }}"><i class="ti-more"></i>Marksheet Generate</a>
                    </li>


                </ul>




            </li>





        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>
