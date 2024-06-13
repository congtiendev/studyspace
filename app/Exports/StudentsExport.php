<?php

namespace App\Exports;

use App\Http\Controllers\Web\traits\UserFormFieldsTrait;
use App\Models\FormFieldOption;
use App\Models\UserFormField;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromCollection, WithHeadings, WithMapping
{
    use UserFormFieldsTrait;

    protected $users;
    protected $currency;
    protected $form;

    public function __construct($users)
    {
        $this->users = $users;
        $this->currency = currencySign();
        $this->form = $this->getFormFieldsByType("user");
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return $this->users;
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        $items = [
            'ID',
            'Tên',
            'Email',
            'Số tiền đã mua',
            'Số tiền đã nạp',
            'Số lần mua',
            'Số dư tài khoản',
            'Nhóm người dùng',
            'Ngày đăng kí',
            'Trạng thái',
        ];


        if (!empty($this->form)) {
            foreach ($this->form->fields as $field) {
                $items[] = $field->title;
            }
        }

        return $items;
    }

    /**
     * @inheritDoc
     */
    public function map($user): array
    {
        $items = [
            $user->id,
            $user->full_name,
            $user->email,
            $user->classesPurchasedsSum,
            $user->getAccountingBalance() + $user->classesPurchasedsSum,
            $user->classesPurchasedsCount,
            $user->getAccountingBalance(),
            !empty($user->userGroup) ? $user->userGroup->group->name : '',
            dateTimeFormat($user->created_at, 'j M Y - H:i'),
            $user->status,
        ];

        if (!empty($this->form)) {
            $items = $this->handleFieldsForExport($this->form, $user, $items);
        }

        return $items;
    }
}
