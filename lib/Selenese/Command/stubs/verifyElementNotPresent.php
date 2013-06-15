<?php

namespace Selenese\Command;

use Selenese\Exception\NoSuchElement;

// verifyElementNotPresent(locator)
class verifyElementNotPresent extends Stub {

    /**
     * @see Command::runWebDriver()
     */
    public function runWebDriver(\WebDriverSession $session)
    {
        try {
            $this->getElement($session, $this->arg1);
            return $this->commandResult(true, false, 'Found, should not have been');
        }
        catch (NoSuchElement $e) {
            return $this->commandResult(true, true, 'Not found, as per-request');
        }
        catch (\Exception $e) {
            return $this->commandResult(false, false, 'Significant error in locating element. Error: ' . $e->getMessage());
        }
    }

}