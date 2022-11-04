<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use App\Models\Link;
use App\Repositories\DomainRepository;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDomains extends Component
{
    use WithPagination;

    protected $listeners = ['domainCreated' => 'render'];

    public $defaultDomain;
//    public $columnChartModel;

    public function mount(){


        $this->defaultDomain = env('APP_URL');
    }

    public function render()
    {
        $columnChartModel =
            (new ColumnChartModel())
                ->setTitle('Expenses by Type')
                ->addColumn('Food', 100, '#f6ad55')
                ->addColumn('Shopping', 200, '#fc8181')
                ->addColumn('Travel', 300, '#90cdf4')
        ;


        return view('livewire.show-domains',[
            'domains' => Domain::paginate(10),
            'columnChartModel' => $columnChartModel
        ]);
    }

    public function verify(Domain $domain){
        return (new DomainRepository())->verifyCustomDomain($domain);
    }

}
