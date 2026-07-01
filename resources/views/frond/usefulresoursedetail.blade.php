@extends('admin.site')
@section('content')

    <style>
        body {
            background: linear-gradient(135deg, #e8f1ff, #f7f9fb);
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .useful-links {
            padding: 60px 0;
        }

        .pageView {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 40px;
            max-width: 1100px;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 40px;
            transition: all 0.4s ease-in-out;
        }

        .pageView:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .projectView {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }

        /* Asosiy rasm */
        .projectView img {
            width: 100%;
            max-width: 650px;
            border-radius: 20px;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .projectView img:hover {
            transform: scale(1.03);
        }

        /* Sarlavha va matn */
        .description {
            text-align: center;
            width: 100%;
            max-width: 900px;
        }

        .description h1 {
            font-size: 30px;
            font-weight: 700;
            color: #004aad;
            margin-bottom: 20px;
            position: relative;
        }

        .description h1::after {
            content: "";
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #00c9a7);
            display: block;
            margin: 10px auto 0;
            border-radius: 4px;
        }

        .description p {
            font-size: 17px;
            line-height: 1.7;
            color: #555;
            margin-bottom: 30px;
        }

        /* Jadval */
        .projectTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        .projectTable th {
            background: #007bff;
            color: #fff;
            font-weight: 600;
            text-align: left;
            padding: 14px 18px;
            font-size: 15px;
            width: 220px;
        }

        .projectTable td {
            background: #f8f9fa;
            padding: 14px 18px;
            font-size: 15px;
            color: #444;
        }

        .projectTable a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .projectTable a:hover {
            color: #00c9a7;
        }

        /* QR kod rasmi */
        .projectTable img {
            width: 130px;
            height: 130px;
            object-fit: contain;
            border-radius: 10px;
            border: 1px solid #eee;
            transition: transform 0.3s ease;
        }

        .projectTable img:hover {
            transform: scale(1.05);
        }

        /* Responsiv dizayn */
        @media (max-width: 768px) {
            .pageView {
                padding: 25px;
            }

            .projectView img {
                max-width: 100%;
            }

            .description h1 {
                font-size: 24px;
            }

            .description p {
                font-size: 15px;
            }

            .projectTable th,
            .projectTable td {
                font-size: 14px;
                display: block;
                width: 100%;
                text-align: left;
            }

            .projectTable th {
                border-radius: 10px 10px 0 0;
            }

            .projectTable tr {
                display: block;
                margin-bottom: 10px;
                border-radius: 10px;
                overflow: hidden;
            }
        }
    </style>

    <main>
        <section>
            <div class="useful-links">
                <div class="container">
                    <div class="pageView">
                        <div class="projectView">
                            <img src="{{ asset('admin/images/' . $resource->image) }}" alt="{{ $resource['title_'. \App::getLocale()] }}">
                            <div class="description">
                                <h1 class="simpleTitle">{{ $resource['title_'. \App::getLocale()] }}</h1>
                                <p>{{ $resource['body_'. \App::getLocale()] }}</p>

                                <table id="w0" class="table detail-view projectTable">
                                    <tbody>
                                    <tr>
                                        <th>Veb-sayt</th>
                                        <td><a href="https://itsm.uz/ru/edu-kids/index" target="_blank">https://itsm.uz/ru/edu-kids/index</a></td>
                                    </tr>
                                    <tr>
                                        <th>Saytga havola</th>
                                        <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAACgCAIAAAAErfB6AAAACXBIWXMAAA7EAAAOxAGVKw4bAAADEUlEQVR4nO3dvUoEQRAAYU80Ft//IcXYxMBsR5il6Z+5or7MwPPYYqAddmcf318/L+J6nf4CqmVgOAPDGRju7fLzx+f7yPf4E5v41u982ud0unxnVzCcgeEMDGdgOAPDXafoVd1e5p1ps24ivTMzZ83Vg9fQFQxnYDgDwxkYzsBw+yl6FZtssyZJxh0KbdfQFQxnYDgDwxkYzsBwkSm6U+f+cGxv/PCp3hUMZ2A4A8MZGM7AcKdP0VmT7ez++SBXMJyB4QwMZ2A4A8NFpujZ2TI2Ic8+b7hqu4auYDgDwxkYzsBwBobbT9GzJ05kyXqWMDZXD15DVzCcgeEMDGdgOAPDXadowD0ML9N7yEddQ1cwnIHhDAxnYDgDw0XOi+7coY1Nraedj3dH0Z0qrmA4A8MZGM7AcAaGyznpru5e5djnZE22WdN41vUJfB9XMJyB4QwMZ2A4A8M9Arcf1E3Ip+1yxz75jrZnJF3BcAaGMzCcgeEMDHedojvf6Bcze2bdaafqbb+PKxjOwHAGhjMwnIHhDAwXmaJn3xUYU/d2xbo7rlOeiHQFwxkYzsBwBoYzMNzpU3Rssq27V2T2HSuBE6RdwXAGhjMwnIHhDAwXmaJn3xUYU/d2xbo7rlOeiHQFwxkYzsBwBoYzMNxpU3Rssq27V2T2HSuBE6RdwXAGhjMwnIHhDAwXmaJn3xUYU/d2xbo7rlOeiHQFwxkYzsBwBoYzMNx+ip49tSOm7uS92VOmA1zBcAaGMzCcgeEMDLd/d6GemisYzsBwBoYzMNwvxACCuNxIF1wAAAAASUVORK5CYII=" alt=""></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="projectImages"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
