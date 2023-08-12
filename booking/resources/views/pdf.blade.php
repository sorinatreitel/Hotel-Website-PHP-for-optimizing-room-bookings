<html>
<head>
    <title>PDF</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .main-panel {
            width: 100%;
            height: 100%;
        }

        .content-wrapper {
            margin: auto;
            max-width: 600px;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: bold;
            margin-right: 20px;
        }

        .form-control-plaintext {
            border: none;
            background-color: transparent;
            font-weight: bold;
        }

        h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        h5 {
            text-align: center;
            margin-bottom: 40px;
        }

        .signature-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-top: 40px;
        }

        .signature,
        .date {
            width: 50%;
        }

        .signature {
            text-align: left;
            margin-top: 10px;
        }

        .date {
            text-align: right;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    @php
        use App\Models\User;
        use App\Models\Payment;
        use App\Models\Room;
        use App\Models\RoomType;
        $user = User::find($booking->id_User);
        $payment = Payment::find($booking->id_Payment);
        $room = Room::find($booking->id_Room);
        $roomtype = RoomType::find($room->id_RoomType);
    @endphp

    <div class="main-panel">
        <div class="content-wrapper">
            <h4>Hotel Perla Somesului</h4>
            <h5>Raport rezervare ID: {{$booking['id_Reservation']}}</h5>

            <div class="form-group">
                <label class="form-label" for="inputType">Nume Complet:</label>
                <input type="text" class="form-control-plaintext" id="inputType" readonly value="{{$booking->fullName}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="inputDesc">Numar de Telefon:</label>
                <input type="text" class="form-control-plaintext" id="inputDesc" readonly value="{{$user->phoneNumber}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="inputPrice">Email:</label>
                <input type="text" class="form-control-plaintext" id="inputPrice" readonly value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="inputCapacity">Data Check in:</label>
                <input type="text" class="form-control-plaintext" id="inputcapacity" readonly value="{{$booking->checkIn}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="inputCapacity">Data Check Out:</label>
                <input type="text" class="form-control-plaintext" id="inputcapacity" readonly value="{{$booking->checkOut}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="inputCapacity">Tip de camera:</label>
                <input type="text" class="form-control-plaintext" id="inputcapacity" readonly value="{{$roomtype->type}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="inputCapacity">Numar camera:</label>
                <input type="text" class="form-control-plaintext" id="inputcapacity" readonly value="{{$room->roomNumber}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="inputCapacity">Modalitate Plata:</label>
                <input type="text" class="form-control-plaintext" id="inputcapacity" readonly value="{{$payment->typePayment}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="inputCapacity">Suma:</label>
                <input type="text" class="form-control-plaintext" id="inputcapacity" readonly value="{{$payment->ammount}}">
            </div>

            <div class="signature-wrapper">
                <div class="signature">
                    Semnatura: ______________________
                </div>
                <div class="date">
                    Data: ______________________
                </div>
            </div>
        </div>
    </div>
</body>
</html>
