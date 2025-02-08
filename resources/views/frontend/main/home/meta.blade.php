<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="The responsive professional Doccure template offers many features, like scheduling appointments with top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta name="keywords"
        content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
    <meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
    <meta property="og:url" content="https://doccure.dreamstechnologies.com/html/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Doctors Appointment HTML Website Templates | Doccure">
    <meta property="og:description"
        content="The responsive professional Doccure template offers many features, like scheduling appointments with top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta property="og:image" content="{{ asset('patient-assets/img/preview-banner.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://doccure.dreamstechnologies.com/html/">
    <meta property="twitter:url" content="https://doccure.dreamstechnologies.com/html/">
    <meta name="twitter:title" content="Doctors Appointment HTML Website Templates | Doccure">
    <meta name="twitter:description"
        content="The responsive professional Doccure template offers many features, like scheduling appointments with top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta name="twitter:image" content="{{ asset('patient-assets/img/preview-banner.jpg') }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('patient-assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('patient-assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('patient-assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('patient-assets/css/feather.css') }}">

    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" href="{{ asset('patient-assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('patient-assets/css/custom.css') }}">

    <style>
        .day-slot {
            margin: 10px 0;
        }

        #daySelectorContainer {
            display: flex;
            gap: 10px;
            padding: 5px;
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: thin;
            /* For Firefox */
            -ms-overflow-style: none;
            /* For Internet Explorer and Edge */
        }

        #daySelectorContainer::-webkit-scrollbar {
            display: none;
            /* For Chrome, Safari, and Opera */
        }

        .day-card {
            flex: 0 0 auto;
            width: 80px;
            padding: 10px;
            background-color: #f1f3f5;
            border: 1px solid #ddd;
            border-radius: 0.375rem;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .day-card:hover,
        .day-card.selected {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .timing {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80%;
            padding: 8px 16px;
            margin: 5px 0;
            background-color: #f1f3f5;
            border: 1px solid #ddd;
            border-radius: 0.375rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #007bff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .timing.selected {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        #proceedToPayBtn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 0.375rem;
            font-size: 1rem;
            text-transform: uppercase;
        }
    </style>
</head>
