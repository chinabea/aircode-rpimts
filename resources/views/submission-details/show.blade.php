@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>
    <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                  SUBMISSION DETAILS
              </div>
              <div class="card-body pad table-responsive">
                <table class="table table-bordered table-sm text-right">
                    <tbody>
                        <tr>
                        <th scope="row" width="25%">PROJECT ID</th>
                        <td class="text-left">{{ $records->id }}</td>
                        </tr>
                        <tr>
                        <th scope="row" width="25%">PROJECT TITLE</th>
                        <td class="text-left">{{ $records->projname }}</td>
                        </tr>
                        <tr>
                        <th scope="row">PROJECT LEADER</th>
                        <td class="text-left">{{ $records->user->name }}
                            {{-- <button type="button" class="btn btn-default btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Send Email">
                                <i class="fa fa-envelope"></i>
                            </button> --}}
                            <a href="{{ route('emailbox.compose') }}" class="btn btn-default btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Send Email">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">STATUS</th>
                        <td class="text-left">{{ $records->status }}</td>
                        </tr>
                        <tr>
                        <th scope="row">DATE SUBMITTED</th>
                        <td class="text-left">{{ ($records->created_at) }}</td>
                        </tr>
                        <tr>
                        <th scope="row">LAST UPDATE</th>
                        <td class="text-left">{{ ($records->updated_at) }}</td>
                        </tr>

                    </tbody>
                </table>
              </div>
            </div>
          </div>

  <div class="col-md-12">
    <div class="text-center">
        <button id="actions-btn" class="btn btn-primary">
            <i class="fas fa-cogs mr-2"></i>Actions
        </button>
        <button id="details-btn" class="btn btn-primary my-2">
            <i class="fas fa-info-circle mr-2"></i>Details
        </button>
        <button id="lib-btn" class="btn btn-primary my-2">
            <i class="fas fa-list-alt mr-2"></i>Line-Item Budget
        </button>
        <button id="classifications-btn" class="btn btn-primary my-2">
            <i class="fas fa-tags mr-2"></i>Classifications
        </button>
        <button id="files-btn" class="btn btn-primary my-2">
            <i class="fas fa-file-alt mr-2"></i>Files
        </button>
        <button id="messages-btn" class="btn btn-primary my-2">
            <i class="fas fa-comments mr-2"></i>Messages
        </button>
        <button id="project-team-btn" class="btn btn-primary my-2">
            <i class="fas fa-users mr-2"></i>Project Team
        </button>
        <button id="status-btn" class="btn btn-primary my-2">
            <i class="fas fa-tasks mr-2"></i>Status
        </button>
        <button id="reviewer-btn" class="btn btn-primary my-2">
            <i class="fas fa-user-check mr-2"></i>Reviewer
        </button>
        <button id="cash-program-btn" class="btn btn-primary my-2">
            <i class="fas fa-money-bill-wave mr-2"></i>Cash Program
        </button>
        <button id="reprogramming-status-btn" class="btn btn-primary my-2">
            <i class="fas fa-sync-alt mr-2"></i>Reprogramming Status
        </button>
      </div>



    <div id="actions-form" class="mt-4" style="display: none;">
    <!-- Form fields go here -->
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
            ACTIONS
        </div>
        <div class="card-body pad table-responsive">

        </div>
      </div>
    </div>
    </div>

    <div id="details-form" class="mt-4" style="display: none;">
    <!-- Form fields go here -->
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
            DETAILS
        </div>
        <div class="card-body pad table-responsive text-left">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-file-pdf fa-sm text-white-50"></i> Export to PDF</a>
            <div>
                <label>Project Name:</label>
                {{ $records->projname }}
                <br>
                <label>Status:</label>
                {{ $records->status }}
                <br>
                <label>Research Group:</label>
                {{ $records->researchgroup }}
                <br>
                <label>Author(s):</label>
                {{ $records->authors }}
                <br>
                <label>Introduction:</label>
                {{ $records->introduction }}
                <br>
                <label>Aims and Objectives:</label>
                {{ $records->aims_and_objectives }}
                <br>
                <label>Background:</label>
                {{ $records->background }}
                <br>
                <label>Expected Research Contribution:</label>
                {{ $records->expected_research_contribution }}
                <br>
                <label>The Proposed Methodology:</label>
                {{ $records->proposed_methodology }}
                <br>
                <label>Start Date:</label>
                {{ $records->start_date }}
                <br>
                <label>End Date:</label>
                {{ $records->end_date }}
                <br>
                <label>Work Plan:</label>
                {{ $records->workplan }}
                <br>
                <label>Resources:</label>
                {{ $records->resources }}
                <br>
                <label>References:</label>
                {{ $records->references }}

            </div>

        </div>
      </div>
    </div>
    </div>

    <div id="lib-form" class="mt-4" style="display: none;">
    <!-- Form fields go here -->
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          LINE-ITEM BUDGET
          </h3>
        </div>
        <div class="card-body pad table-responsive text-left">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right">
              <i class="far fa-file-excel fa-sm text-white-50"></i> Export to Excel
          </a>
          <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#lib">Add Line-Item</button>
              @include('submission-details.line-items-budget.create')
              <table id="" class="table table-hover table-bordered text-center table-sm">
                <thead class="table-info">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                  @foreach($lineItems as $lineItem)
                <tbody>
                  <tr>
                    <td class="align-middle">{{ $loop->iteration }}.</td>
                    <td>{{ $lineItem->name }}</td>
                    <td>{{ $lineItem->quantity }}</td>
                    <td>{{ $lineItem->unit_price }}</td>
                    <td>
                      <a href="{{ route('submission-details.line-items-budget.edit', $lineItem->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $lineItem->id }}">
                          <i class="fas fa-edit"></i>
                      </a>
                      <div class="modal fade" id="editModal{{ $lineItem->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $lineItem->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModal{{ $lineItem->id }}Label">Edit Line-Item Budget</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{ route('submission-details.line-items-budget.update', $lineItem->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <!-- Input fields for editing -->
                                        <div class="form-group">
                                            <label for="edit_name">Name:</label>
                                            <input type="text" class="form-control" id="edit_name{{ $lineItem->id }}" name="name" value="{{ $lineItem->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_quantity">Quantity:</label>
                                            <input type="number" class="form-control" id="edit_quantity{{ $lineItem->id }}" name="quantity" value="{{ $lineItem->quantity }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_unit_price">Unit Price:</label>
                                            <input type="number" class="form-control" id="edit_unit_price{{ $lineItem->id }}" name="unit_price" value="{{ $lineItem->unit_price }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.line-items-budget.destroy', $lineItem->id) }}')">
                      <i class="fas fa-trash"></i>
                    </button>
                          <script>
                          function confirmDelete(url) {
                              if (confirm('Are you sure you want to delete this record?')) {
                              // Create a hidden form and submit it programmatically
                              var form = document.createElement('form');
                              form.action = url;
                              form.method = 'POST';
                              form.innerHTML = '@csrf @method("delete")';
                              document.body.appendChild(form);
                              form.submit();
                              }
                          }
                          </script>
                    </td>
                  </tr>
                </tbody>
              @endforeach
              </table>


        </div>
      </div>
    </div>
    </div>

    <div id="classifications-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                CLASSIFICATIONS
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </div>

    <div id="files-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                FILES
          </h3>
        </div>
        <div class="card-body pad table-responsive">
        <!-- <div class="card-body pad table-responsive text-left"> -->
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-file-pdf fa-sm text-white-50"></i> Export to PDF</a> -->
        <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#filesModal">Add Files</button>
            @include('submission-details.files.create')
            <table id="" class="table table-hover table-bordered text-center table-sm">
                <thead class="table-info">
                  <tr>
                    <th>#</th>
                    <th>Name / Type</th>
                    <th>Filename</th>
                    <th>Date Uploaded</th>
                    <th>Action</th>{{-- preview as modal or download --}}
                  </tr>
                </thead>
                  @foreach($lineItems as $lineItem)
                <tbody>
                  <tr>
                    <td class="align-middle">{{ $loop->iteration }}.</td>
                     <td>cv</td>
                    <td>filename</td>
                    <td>date</td>
                    <td>
                      <a href="{{ route('submission-details.line-items-budget.edit', $lineItem->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $lineItem->id }}">
                          <i class="fas fa-edit"></i>
                      </a>
                      <div class="modal fade" id="editModal{{ $lineItem->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $lineItem->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModal{{ $lineItem->id }}Label">Edit Line-Item Budget</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{ route('submission-details.line-items-budget.update', $lineItem->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <!-- Input fields for editing -->
                                        <div class="form-group">
                                            <label for="edit_name">Name:</label>
                                            <input type="text" class="form-control" id="edit_name{{ $lineItem->id }}" name="name" value="{{ $lineItem->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_quantity">Quantity:</label>
                                            <input type="number" class="form-control" id="edit_quantity{{ $lineItem->id }}" name="quantity" value="{{ $lineItem->quantity }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_unit_price">Unit Price:</label>
                                            <input type="number" class="form-control" id="edit_unit_price{{ $lineItem->id }}" name="unit_price" value="{{ $lineItem->unit_price }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.line-items-budget.destroy', $lineItem->id) }}')">
                      <i class="fas fa-trash"></i>
                    </button>
                          <script>
                          function confirmDelete(url) {
                              if (confirm('Are you sure you want to delete this record?')) {
                              // Create a hidden form and submit it programmatically
                              var form = document.createElement('form');
                              form.action = url;
                              form.method = 'POST';
                              form.innerHTML = '@csrf @method("delete")';
                              document.body.appendChild(form);
                              form.submit();
                              }
                          }
                          </script>
                    </td>
                  </tr>
                </tbody>
              @endforeach
              </table>


        </div>
      </div>
    </div>
  </div>

    <div id="messages-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                MESSAGES
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </div>

    <div id="project-team-form" class="mt-4" style="display: none;">
        <div class="col-md-12">
          <div class="card card-outline">
            <div class="card-header text-center ">
                PROJECT TEAM
            </div>
            <div class="card-body pad table-responsive">
            <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#ProjectTeam">Add Project Members</button>
                @include('submission-details.project-teams.create')
                <table id="" class="table table-hover table-bordered text-center table-sm">
                <thead class="table-info">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @foreach($teamMembers as $member)
                <tbody>
                  <tr>
                    <td class="align-middle">{{ $loop->iteration }}.</td>
                    <td>{{ $member->member_name }}</td>
                    <td>{{ $member->role }}</td>
                    <td>
                      <a href="{{ route('submission-details.project-teams.edit', $member->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $member->id }}">
                          <i class="fas fa-edit"></i>
                      </a>
                      <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $member->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModal{{ $member->id }}Label">Edit Project Team Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{ route('submission-details.project-teams.update', $member->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <!-- Input fields for editing -->
                                        <div class="form-group">
                                            <label for="edit_member_name">Name:</label>
                                            <input type="text" class="form-control" id="edit_member_name{{ $member->id }}" name="member_name" value="{{ $member->member_name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_role">Role:</label>
                                            <select class="form-control" id="edit_role{{ $member->id }}" name="role" required>
                                                <option disabled>Select Role</option>
                                                <option{{ $member->role === 'Project Leader' ? ' selected' : '' }}>Project Leader</option>
                                                <option{{ $member->role === 'Database Designer' ? ' selected' : '' }}>Database Designer</option>
                                                <option{{ $member->role === 'Network Designer' ? ' selected' : '' }}>Network Designer</option>
                                                <option{{ $member->role === 'UI Designer' ? ' selected' : '' }}>UI Designer</option>
                                                <option{{ $member->role === 'Quality Assurance' ? ' selected' : '' }}>Quality Assurance</option>
                                                <option{{ $member->role === 'Document Writer' ? ' selected' : '' }}>Document Writer</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.project-teams.destroy', $member->id) }}')">
                      <i class="fas fa-trash"></i>
                    </button>
                          <script>
                          function confirmDelete(url) {
                              if (confirm('Are you sure you want to delete this record?')) {
                              // Create a hidden form and submit it programmatically
                              var form = document.createElement('form');
                              form.action = url;
                              form.method = 'POST';
                              form.innerHTML = '@csrf @method("delete")';
                              document.body.appendChild(form);
                              form.submit();
                              }
                          }
                          </script>
                    </td>
                  </tr>
                </tbody>
              @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
   </div>

    <div id="status-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-outline">
        <div class="card-header text-center">
                STATUS
          </h3>
        </div>
        <div class="card-body pad table-responsive">
        <div class="container"><h3>Edit Project Status</h3>
          <form action="{{ route('projects.updateStatus', ['id' => $records->id]) }}" method="POST">
              @csrf
              @method('PUT')
              <!-- Other form fields... -->
              <input type="hidden" name="project_id" value="{{ $records->id }}">
              <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" id="status" name="status" required>
                      <option value="New">New</option>
                      <option value="Draft">Draft</option>
                      <option value="Under Evaluation">Under Evaluation</option>
                      <option value="For Revision">For Revision</option>
                      <option value="Approved">Approved</option>
                      <option value="Deferred">Deferred</option>
                      <option value="Disapproved">Disapproved</option>
                  </select>
              </div>
              <button type="submit" class="btn btn-primary">Update Status</button>
          </form>

        </div>
        </div>
      </div>
    </div>
    </div>

    <div id="reviewer-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                REVIEWER
          </h3>
        </div>
        <div class="card-body pad table-responsive">
        <div class="container">
            <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#ReviewerModal">Select Reviewer</button>
                @include('submission-details.reviews.select-reviewer')
                {{-- <form action="{{ route('submission-details.reviews.assignReviewers') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Select Reviewers:</label>
                        <select name="reviewer_ids[]" class="form-control" multiple>
                            @foreach($reviewers as $reviewer)
                                <option value="{{ $reviewer->id }}">{{ $reviewer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Assign Reviewers</button>
                </form> --}}





        </div>
        </div>
      </div>
    </div>
    </div>

    <div id="cash-program-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                CASH PROGRAM
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </div>

    <div id="reprogramming-status-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                REPROGRAMMING STATUS
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </form>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="{{ asset('submissiondetailbuttons.js') }}"></script>

</div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>


@endsection
