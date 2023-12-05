<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'english', sans-serif;
        }

        .bangla {
            font-family: "bangla", sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th,
        table td {
            padding: 5px;
            font-size: 14px !important;
        }


        .table-bordered td {
            border: 1px solid #000;
        }

        p,
        h3,
        h4 {
            margin: 0;
            margin-bottom: 8px;
        }

        p{
            font-size: 16px;
        }


        h4 {
            text-decoration: underline;
            text-decoration-thickness: 2px;
        }

        .small {
            font-size: 12px !important;
        }
    </style>

</head>

<body>

    <table>
        <tr>
            <td style="text-align: center;">
                <p class="bangla" style="font-size: 18px;">পরীক্ষা নিয়ন্ত্রকের কার্যালয়</p>
                <h3 class="bangla" style="font-size: 24px; font-weight: bold;">খুলনা বিশ্ববিদ্যালয়</h3>
                <h4 class="bangla" style="font-size: 18px;">পরীক্ষা পারিতোষিক বিল ফরম</h4>
                <p class="bangla" style="font-size: 14px;">(প্রতি বর্ষের প্রতি টার্মের জন্য পৃথক বিল ফরম ব্যবহার করতে হবে)</p>
            </td>
        </tr>
    </table>
    {{-- <br> --}}
    <table>

        <tr>
            <td style="width: 505;">
                <p><span class="bangla" style="font-size: 20px;">নাম</span> : {{ $user->name }}</p>
            </td>
            <td style="width: 50%;">
                <p><span class="bangla" style="font-size: 20px;">যে ডিসিপ্লিনের পরীক্ষা</span> : {{ $discipline->name }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><span class="bangla" style="font-size: 20px;">পদবী</span> :
                    @if($user->designation)
                    {{ $user->designation['name'] }}
                    @endif
                </p>
            </td>
            <td>
                <p><span class="bangla" style="font-size: 20px;">বর্ষ</span> : {{ $exam->year['year'] }} <span class="bangla" style="font-size: 20px;">শিক্ষাবর্ষ</span> : {{ $exam->session['session'] }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><span class="bangla" style="font-size: 20px;">ডিসিপ্লিন / বিভাগ</span> : {{ $discipline->name }}</p>
            </td>
            <td>
                <p><span class="bangla" style="font-size: 20px;">টার্ম</span> : {{ $exam->term['term'] }} / <span class="bangla" style="font-size: 20px;">স্পেশাল টার্ম/ পরীক্ষা</span> - {{ date('Y', strtotime($exam->created_at)) }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><span class="bangla" style="font-size: 20px;">ঠিকানা</span> : {{ $user->address }}</p>
            </td>
            <td>
                <p><span class="bangla" style="font-size: 20px;">পরীক্ষা অনুষ্ঠানের তারিখ</span> : {{ date('d-m-Y', strtotime($exam->start_date)) }} <span class="bangla" style="font-size: 20px;">থেকে</span> {{ date('d-m-Y', strtotime($exam->end_date)) }} পর্যন্ত</p>
            </td>
        </tr>
    </table>
    <br>

    <table>
        <tr>
            <td style="text-align: center; text-decoration: underline;"><span class="bangla" style="font-size: 18px;">পরীক্ষা সংক্রান্ত কাজের বিবরণ</span></td>
        </tr>
    </table>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>#</td>
                <td><span class="bangla" style="font-size: 16px;">বিবরণ</span></td>
                <td><span class="bangla" style="font-size: 16px;">কোর্স নম্বর</span></td>
                <td><span class="bangla" style="font-size: 16px;">প্রশ্ন/খাতা/কোর্স<br>পরীক্ষক/দিনের সংখ্যা</span></td>
                <td><span class="bangla" style="font-size: 16px;">ছাত্র সংখ্যা</span></td>
                <td><span class="bangla" style="font-size: 16px;">অর্ধ/পূর্ণপত্র</span></td>
                <td><span class="bangla" style="font-size: 16px;">পারিতোষিক হার</span></td>
                <td><span class="bangla" style="font-size: 16px;">মোট টাকা</span></td>
            </tr>
        </thead>
        <tbody>
            @php
            $grand_total = 0;
            @endphp

            @foreach($categories as $category)

            @php
            $rems = App\Models\Remuneration::where('exam_id', $exam->id)
            ->where('discipline_id', $discipline->id)
            ->where('user_id', $user->id)
            ->where('category_id', $category->id)
            ->get()
            @endphp
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><span class="bangla">{{ $category->name }}</td>
                <td>
                    @if($rems->count() > 1)
                    {{ $rems->count() }} Courses
                    @else
                    @foreach($rems as $rem)
                    {{ $rem->course['course'] }}
                    @endforeach
                    @endif
                </td>
                <td>
                    @php
                    $number = 0;
                    if($rems->count() > 0){
                    foreach($rems as $rem){
                    $number = $number + $rem->number;
                    }
                    }else{
                    $number = "";
                    }
                    @endphp

                    {{ $number }}

                </td>
                <td>
                    @php
                    $students = 0;

                    if($rems->count() > 0){
                    foreach($rems as $rem){
                    $students = $students + $rem->students;
                    }
                    }else{
                    $students = "";
                    }

                    @endphp

                    {{ $students }}

                </td>
                <td>
                    @if($rems->count() == 1)
                    @foreach($rems as $rem)
                    @if($rem->paper == 'half')
                    <span class="bangla">অর্ধপত্র</span>
                    @else
                    <span class="bangla">পূর্ণপত্র</span>
                    @endif
                    @endforeach
                    @endif
                </td>
                <td>


                    @php
                    $rate = App\Models\Remuneration::where('exam_id', $exam->id)
                    ->where('discipline_id', $discipline->id)
                    ->where('user_id', $user->id)
                    ->first();
                    @endphp

                    @if($rems->count() > 0)
                    {{ $rate->rate['amount'] }}
                    @endif



                </td>
                <td>
                    @php
                    $sum = 0;

                    if($rems->count() > 0){
                    foreach($rems as $rem){
                    if($rem->paper == 'half'){
                    $amount = $rem->rate['amount'] / 2;
                    }else{
                    $amount = $rem->rate['amount'];
                    }

                    if($rem->number && $rem->students){
                    $total = $amount * $rem->number * $rem->students;
                    }elseif($rem->number != null){
                    $total = $amount * $rem->number;
                    }elseif($rem->students != null){
                    $total = $amount * $rem->students;
                    }

                    $grand_total = $grand_total + $total;

                    $sum = $sum + $total;

                    }
                    }else{
                    $sum = "";
                    }


                    @endphp
                    {{ $sum }}


                </td>

            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" style="text-align: end;"><span class="bangla" style="font-size: 16px;">সর্বমোট টাকার পরিমাণ</span></td>
                <td>{{ $grand_total }}</td>
            </tr>
            <tr>
                @php
                $text = new Rakibhstu\Banglanumber\NumberToBangla();
                @endphp
                <td colspan="8"><span class="bangla" style="font-size: 16px;">সর্বমোট টাকার পরিমাণ (কথায়) : {{ $text->bnMoney($grand_total) }} </span></td>
            </tr>
        </tfoot>
    </table>
    <br>
    <table class="footer">
        <tr>
            <td style="width: 40%;">
                <table>
                    <tr>
                        <td>
                            <p>.........................</p>
                            <p class="bangla small">ডিসিপ্লিন প্রধান</p>
                            <p class="bangla small">(স্বাক্ষর ও সিল)</p>
                        </td>
                        <td>
                            <p>.........................</p>
                            <p class="bangla small">সভাপতি, পরীক্ষা কমিটি</p>
                            <p class="bangla small">(স্বাক্ষর ও সিল)</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 60%;">
                <table>
                    <tr style="border: 1px solid #000;">
                        <td style="width: 70%;">
                            <p class="bangla small">
                                এই বিলের প্রাপ্য অর্থ অগ্রণী ব্যাংক, খুলনা বিশ্ববিদ্যালয় শাখায় আমার নামে রক্ষিত ................. নং হিসাবে/চেকের মাধ্যমে পরিশোধের অনুরোধ করছি এবং এই মর্মে অঙ্গীকার করছি যে, এই বিলে আমি কোন অতিরিক্ত অর্থ দাবী করিনি। যদি ভবিষ্যতে এই বিলে কোন আপত্তি উত্থাপিত হয় তাহলে গৃহীত অতিরিক্ত অর্থ ফেরত দিতে বাধ্য থাকব।
                            </p>
                            </p>
                            <p class="bangla small">বিঃ দ্রঃ- প্রত্যেক বিলে রাজস্ব টিকিট লাগাতে হবে।</p>
                        </td>
                        <td style="width: 30%;">
                            <table>
                                <tr>
                                    <td style="width: 70%; height: 100px; border: 1px solid #000;">
                                        <p class="bangla small">রাজস্ব টিকিট</p>
                                    </td>
                                </tr>
                            </table>
                            <br><br>
                            <span class="bangla small">প্রাপকের স্বাক্ষর ও তারিখ</span>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <h4><span class="bangla small">পরীক্ষা নিয়ন্ত্রক কার্যালয়ের ব্যবহারের জন্য</span></h4>
                <p class="bangla small">পরীক্ষা পারিতোষিক হার এবং ডিসিপ্লিন থেকে প্রাপ্ত স্টেটমেন্ট অনুযায়ী বিলসমূহ নিরীক্ষান্তে বিলের অর্থ পরিশোধের জন্য সুপারিশ করা হলো।</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <p>.........................</p>
                            <p class="bangla small">বিল নিরিক্ষক/সেকশন অফিসার/সহকারী পরীক্ষা নিয়ন্ত্রক</p>
                        </td>
                        <td style="text-align: center;">
                            <p>.........................</p>
                            <p class="bangla small">উপ-পরীক্ষা নিয়ন্ত্রক</p>
                        </td>
                        <td style="text-align: end;">
                            <p>.........................</p>
                            <p class="bangla small">পরীক্ষা নিয়ন্ত্রক</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <h4><span class="bangla small">অর্থ ও হিসাব বিভাগের ব্যবহারের জন্য</span></h4>
                <p class="bangla small">পরিক্ষান্তে বর্ণিত পারিতোষিক বিল বাবদ........................................................................
                    কথায়ঃ(.........................................................................<br>............................................)মাত্র পরিশোধের জন্য ছাড়া হলো।</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <p>.........................</p>
                            <p class="bangla small">সেকশন অফিসার/সহকারী পরিচালক</p>
                        </td>
                        <td style="text-align: center;">
                            <p>.........................</p>
                            <p class="bangla small">উপ-পরিচালক</p>
                        </td>
                        <td style="text-align: end;">
                            <p>.........................</p>
                            <p class="bangla small">পরিচালক</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>