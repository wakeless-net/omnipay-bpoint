<?php

namespace Omnipay\BPoint\Message;

class CaptureRequest extends AbstractRequest
{
    public function getAction() {
      return "capture";
    }

    public function getData()
    {
        $this->validate('amount', 'currency', "originalTxnNumber");

        $data = parent::getData();
        $data["OriginalTxnNumber"] = $this->getOriginalTxnNumber() ?: $this->getTransactionReference();

        return $data;
    }
}

