 <h4 class="font-weight-bold pl-2 mt-2">Basic Information</h4>
 <table id="example" class="table  table-bordered">
                            <tr>
                                <th>Student Name</th>
                                <td>{{ $student->student_name ?? null }}</td>
                            </tr>
                            <tr>
                                <th>Father's Name</th>
                                <td>{{ $student->father_name }}</td>
                            </tr>
                            <tr>
                                <th>Father's Profession</th>
                                <td>{{ $student->father_profession }}</td>
                            </tr>
                            <tr>
                                <th>Father's Mobile</th>
                                <td>{{ $student->father_mobile }}</td>
                            </tr>
                            <tr>
                                <th>Mother's Name</th>
                                <td>{{ $student->mother_name }}</td>
                            </tr>
                            <tr>
                                <th>Mother's Profession</th>
                                <td>{{ $student->mother_profession }}</td>
                            </tr>
                            <tr>
                                <th>Mother's Mobile</th>
                                <td>{{ $student->mother_mobile }}</td>
                            </tr>
                            <tr>
                                <th>School Name</th>
                                <td>{{ $student->school_name }}</td>
                            </tr>
                            <tr>
                                <th>Class Name</th>
                                <td>{{ $student->class_name }}</td>
                            </tr>
                            <tr>
                                <th>SMS Mobile </th>
                                <td>{{ $student->sms_mobile }}</td>
                            </tr>
                            <tr>
                                <th>Student Id </th>
                                <td>{{ $student->id }}</td>
                            </tr>
                            <tr>
                                <th>Password </th>
                                <td>{{ $student->password }}</td>
                            </tr>
                            <tr>
                                <th>E-Mail </th>
                                <td>{{ $student->email_address ? $student->email_address : 'null@gmail.com' }}</td>
                            </tr>
                            <tr>
                                <th>Address </th>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <th>Courses Info </th>
                                <td>
                                    {{-- @foreach ($student as $data) --}}
                                    Course: {{ $student->student_type ?? null }}, Batch:
                                    {{ $student->batch_name ?? null }}, Roll: {{ $student->roll ?? null }}
                                    {{-- @endforeach --}}
                                </td>
                            </tr>
                        </table>
