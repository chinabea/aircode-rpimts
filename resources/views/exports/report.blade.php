<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <style>
        .header {
            text-align: center;
        }
        /* .header img {
            max-width: 200px; 
        } */
        body {
            font-family: "Times New Roman", serif;
            font-size: 11pt;
            color: black;
            /* margin-top: 0.5in; */
            margin-left: 0.5in;
            margin-right: 0.5in;
            margin-bottom: 0.3in;
        }

        h1, h2 {
            font-size: 12pt;
        }

        h3, p {
            font-size: 11pt;
            text-align: justify;
        }
        .tab {
            /* margin-left: 2em; Adjust the value as needed */
            margin-top: 0;
        }

    </style>
</head>
<body>
<img id="pdfLogo" src="{{ public_path('dist/img/header.jpg') }}" alt="logo" style="width:100%; margin:0;">
    <div>
        <div style="text-align: center;">
            <!-- <h1>Project Name</h1> -->
            <h1>{{ $data->projname }}</h1>
            <br>
        </div>
        <h2>Status</h2>
        <p>{{ $data->status }}</p>
        <br>

        <h2>Research Group</h2>
        <p>{{ $data->researchgroup }}</p>
        <br>
        
        <h2>Author(s):</h2>
        {{ $data->authors }}
        <p>{{ $data->user->name }}</p>
        @foreach ($projMembers as $member)
            <p>{{ $member->member_name }}</p>
        @endforeach
        <br>

        <h2>Introduction</h2>
        <p>{!! $data->introduction !!}</p>
        <br>

        <h2>Aims and Objectives</h2>
        <p>{!! $data->aims_and_objectives !!}</p>
        <br>

        <h2>Background</h2>
        <p>{!! $data->background !!}</p>
        <br>

        <h2>Expected Research Contribution</h2>
        <p>{!! $data->expected_research_contribution !!}</p>
        <br>

        <h2>The Proposed Methodology</h2>
        <p>{!! $data->proposed_methodology !!}</p>
        <br>

        <h2>Work Plan</h2>
        <p>{!! $data->workplan !!}</p>
        <br>

        <!-- <h2>Start Month</h2>
        <p>{{ $data->start_month }}</p>
        <br>

        <h2>End Month</h2>
        <p>{{ $data->end_month }}</p>
        <br> -->

        <h2>Resources</h2>
        <p>{!! $data->resources !!}</p>
        <br>

        <h2>References</h2>
        <p>{!! $data->references !!}</p>
        <br>

    </div>
</body>
</html>
